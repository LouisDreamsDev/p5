<?php

namespace App\src\constraint;
use App\config\Parameter;

class WalletValidation extends Validation

{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) 
        {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'title') {
            $error = $this->check_title($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function check_title($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('title', $value);
        }
        if ($this->constraint->special_char($name, $value)) {
            return $this->constraint->special_char('title', $value);
        }
        if($this->constraint->minLength($name, $value, 3)) {
            return $this->constraint->minLength('title', $value, 3);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('title', $value, 255);
        }
    }
}