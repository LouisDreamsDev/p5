<?php

namespace App\src\constraint;

class Validation
{
    public function validate($data, $name)
    {
        if ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
        elseif ($name === 'Wallet')
        {
            $walletValidation = new UserValidation();
            $errors = $walletValidation->check($data);
            return $errors;   
        }
    }
}