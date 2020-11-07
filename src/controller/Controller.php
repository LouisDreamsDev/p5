<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CoinDAO;
use App\src\DAO\UserDAO;
use App\src\DAO\WalletDAO;
use App\src\model\View;
use App\src\services\CmcApiService;

abstract class Controller
{
    protected $articleDAO;
    protected $coinDAO;
    protected $userDAO;
    protected $walletDAO;
    protected $view;
    protected $CmcApiService;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->coinDAO = new CoinDAO();
        $this->walletDAO = new WalletDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->CmcApiService = new CmcApiService();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}