<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        //$this->refreshApiData();
        $coins = $this->coinDAO->getCoins();
        return $this->view->render('home', [
            'coins' => $coins,
        ]);
    }

    public function refreshApiData()
    {
        $call = $this->CmcApiService->APICall();
        $this->coinDAO->addApiDataIntoDb($call);
        header('Location: ../public/index.php');
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
        ]);
    }

    public function register(Parameter $post)
    {
        if($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                if($this->userDAO->checkUser($post)) {
                    $errors['pseudo'] = $this->userDAO->checkUser($post);
                }
                    if(!$errors) {
                    $this->userDAO->register($post);
                    $this->session->set('register', 'Votre inscription a bien été effectuée !');
                    header('Location: ../public/index.php');
                }
                return $this->view->render('register', [
                    'post' => $post,
                    'errors' => $errors
                ]);
        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir !');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}