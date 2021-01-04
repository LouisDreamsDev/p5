<?php

namespace App\src\controller;

use App\config\Parameter;
use App\src\model\Wallet;

class BackController extends Controller
{

    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } 
        else 
        {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } 
        else 
        {
            return true;
        }
    }

    public function administration()
    {
        if($this->checkAdmin()) {
            $articles = $this->articleDAO->getArticles();
            $comments = $this->commentDAO->getFlagComments();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'articles' => $articles,
                'comments' => $comments,
                'users' => $users
            ]);   
        }
    }

    public function my_wallets()
    {
        if($this->checkLoggedIn()) {
            $userId = $this->session->get('id');
            $wallets = $this->walletDAO->getWalletsFromUser($userId);
            d($wallets);
            $wallet_content = [];
            foreach($wallets as $wallet)
            {
                d($wallet);
                $wallet_id = $wallet->getId();
                array_push($wallet_content, $this->walletHasCoinsDAO->getCoinsFromWallet($wallet_id));
            }
            d($wallet_content);
            return $this->view->render('my_wallet', [
                'wallets' => $wallets,
                'wallet_content' => $wallet_content,
            ]);
        }
    }

    public function create_wallet()
    {

    }

    public function edit_wallet(Parameter $post, $wallet_id)
    {
        $wallet = $this->walletDAO->get_wallet($wallet_id);
        $coins = $this->walletHasCoinsDAO->getCoinsFromWallet($wallet_id);
        if($post->get('submit')) 
        {
            $errors = $this->validation->validate($post, 'Wallet');
            if (!$errors)
            {
                $this->walletDAO->edit_wallet($post, $wallet_id, $this->session->get('id'));
                $this->walletHasCoinsDAO->edit_coin_quantity($wallet_id, $post->get('w_coin_id'), $post->get('coin_quantity'));
                $this->session->set('edit_wallet', 'Le portefeuille a bien été modifié.');
                header('Location: ../public/index.php?route=my_wallet');
            }
            return $this->view->render('edit_wallet', [
                'post' => $post,
                'coins' => $coins,
                'errors' => $errors,
            ]);
        }
        $post->set('id', $wallet->getId());
        $post->set('title', $wallet->getTitle());
        return $this->view->render('edit_wallet', [
            'post' => $post,
            'coins' => $coins
        ]);
    }

    public function delete_wallet($wallet_id) 
    {
        if($this->checkLoggedIn()) {
            $this->walletDAO->delete_wallet($wallet_id);
            $this->session->set('delete_wallet', 'Le portefeuille a bien été supprimé.');
            header('Location: ../public/index.php?route=my_wallet');
        }
    }

    public function delete_coin_from_wallet($wallet_id, $w_coin_id)
    {
        if($this->checkLoggedIn())
        {
            $this->walletHasCoinsDAO->delete_coin_from_wallet($wallet_id, $w_coin_id);
            $this->session->set('delete_wallet', 'L\'asset a bien été supprimé.');
            header('Location: ../public/index.php?route=my_wallet');
        }
    }

    public function profile()
    {
        if($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                $this->session->set('update_password', 'Le mot de passe a bien été mis à jour.');
                header('Location: ../public/index.php?route=profile');
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if($this->checkLoggedIn())
        {
            $this->logoutOrDelete('logout');    
        }
    }

    public function deleteAccount()
    {
        if($this->checkLoggedIn())
        {
            $this->userDAO->deleteAccount($this->session->get('pseudo'));
            $this->logoutOrDelete('delete_account');   
        }
    }

    public function deleteUser($userId)
    {
        if($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
        }
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé.');
        }
        header('Location: ../public/index.php');
    }

    public function contact()
    {
        if($this->checkLoggedIn())
        {
            return $this->view->render('contact');   
        }
    }
}