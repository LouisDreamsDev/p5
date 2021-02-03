<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['name']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT user.id, user.pseudo, user.CreatedAt, role.name FROM user INNER JOIN role ON user.roleId = role.id ORDER BY user.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = 'INSERT INTO user (pseudo, mail, password, createdAt, roleId) VALUES (?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('mail'), password_hash($post->get('password'), PASSWORD_BCRYPT), 1]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) 
                FROM user 
                WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Le pseudo existe déjà !</p>';
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT user.id, user.roleId, user.password, role.name 
                FROM user 
                INNER JOIN role 
                ON role.id = user.roleId 
                WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        if($result && password_verify($post->get('password'), $result['password']))
        {
            $isPasswordValid = true;

            return [
                'result' => $result,
                'isPasswordValid' => $isPasswordValid
            ];
        }
    }
    
    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user 
                SET password = ? 
                WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE 
                FROM user 
                WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE 
                FROM user 
                WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }
}