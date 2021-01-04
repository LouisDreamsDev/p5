<?php

namespace App\src\controller;

use App\config\Parameter;

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

    public function myWallets()
    {
        if($this->checkLoggedIn()) {
            $userId = $this->session->get('id');
            $wallets = $this->walletDAO->getWalletsFromUser($userId);
            return $this->view->render('my_wallet', [
                'wallets' => $wallets,
            ]);
        }
    }

    public function createWallet()
    {

    }

    public function editWallet(Parameter $post, $walletId)
    {
        $wallet = $this->walletDAO->getWallet($walletId);
        $coins = $this->walletHasCoinsDAO->getCoinsFromWallet($walletId);
        if($post->get('submit')) 
        {
            $errors = $this->validation->validate($post, 'Wallet');
            if (!$errors)
            {
                $this->walletDAO->editWallet($post, $walletId, $this->session->get('id'));
                $this->walletHasCoinsDAO->editCoinQuantity($walletId, $post->get('CoinId'), $post->get('coinQuantity'));
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

    public function deleteWallet($walletId) 
    {
        if($this->checkLoggedIn()) {
            $this->walletDAO->deleteWallet($walletId);
            $this->session->set('delete_wallet', 'Le portefeuille a bien été supprimé.');
            header('Location: ../public/index.php?route=my_wallet');
        }
    }

    public function deleteCoinFromWallet($walletId, $coinId)
    {
        if($this->checkLoggedIn())
        {
            $this->walletHasCoinsDAO->deleteCoinFromWallet($walletId, $coinId);
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