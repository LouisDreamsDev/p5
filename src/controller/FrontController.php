<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        return $this->view->render('home');
    }

    public function refreshApiData()
    {
        $call = $this->CmcApiService->APICall();
        $this->coinDAO->addApiDataIntoDb($call);
        header('Location: ../public/index.php');
    }

    public function showJson() 
    {
        $coins = $this->coinDAO->getCoins();
        $result = [];
        foreach($coins as $coin)
        {
            $set = [
                "id" => $coin->getId(),
                "name" => $coin->getCoinName(),
                "symbol" => $coin->getSymbol(),
                "slug" => $coin->getSlug(),
                "maxSupply" => $coin->getMaxSupply(),
                "totalSupply" => $coin->getTotalSupply(),
                "cmcRank" => $coin->getCmcRank(),
                "lastUpdated" => $coin->getLastUpdated(),
                "price" => $coin->getPrice(),
                "volume24h" => $coin->getVolume24h(),
                "percentChange1h" => $coin->getPercentChange1h(),
                "percentChange24h" => $coin->getPercentChange24h(),
                "percentChange7d" => $coin->getPercentChange7d(),
                "marketCap" => $coin->getMarketCap()
            ];
            $result[] = $set;
        }

        $json = json_encode($result);
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        echo $json;
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
                    $this->session->set('register', 'Votre inscription a bien été effectuée. Bienvenue sur Wallet(x) !');
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
                $this->session->set('errorLogin', 'Le pseudo ou le mot de passe est incorrect. Veuillez Réessayer.');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}