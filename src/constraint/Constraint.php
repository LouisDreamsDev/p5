<?php

namespace App\src\constraint;

use App\config\Parameter;

class Constraint
{
    public function notBlank($name, $value)
    {
        if(empty($value)) {
            return '<p>Le champ '.$name.' saisi est vide.</p>';
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if(strlen($value) < $minSize) {
            return '<p>Le champ '.$name.' doit contenir au moins '.$minSize.' caractères !</p>';
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if(strlen($value) > $maxSize) {
            return '<p>Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères.</p>';
        }
    }

    public function onlyLetters($name, $value)
    {
        if (!ctype_alpha($value)) 
        {
            return '<p>Votre '.$name.' ne peut contenir que des lettres. <br> '.$value.' n\'est donc pas valide.</p>';
        }
    }

}