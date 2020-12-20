<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                if($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'contact'){
                    $this->backController->contact();
                }
                elseif($route === 'my_wallet'){
                    $this->backController->my_wallets();
                }
                elseif($route === 'delete_wallet'){
                    $this->backController->delete_wallet($this->request->getGet()->get('wallet_id'));
                }
                elseif($route === 'edit_wallet'){
                    $this->backController->edit_wallet($this->request->getPost(), $this->request->getGet()->get('wallet_id'));
                }
                elseif($route === 'delete_coin_from_wallet'){
                    $this->backController->delete_coin_from_wallet($this->request->getGet()->get('wallet_id'), $this->request->getGet()->get('w_coin_id'));
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                elseif ($route === 'refreshApi'){
                    $this->frontController->refreshApiData();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer($e);
            echo $e->getMessage().' '.$e->getLine().' '.$e->getTraceAsString();
        }
    }
}