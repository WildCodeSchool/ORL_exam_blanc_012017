<?php

namespace ExamBlancBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlgoController extends Controller
{

    //////////////////////////////////////
    // Complète les fonctions suivantes //
    //////////////////////////////////////

    // Exercice 1
    public function number_of_char($str)
    {
        $str = 'A';
        $tabstr = str_split($str);
        $pattern = '[a-zA-Z]';

        foreach ($tabstr as $teststr) {

            if (ctype_alnum($teststr) || preg_match($pattern, $str)) {

                $strLower = strtolower($str);

            } else {
                echo "La chaîne $teststr ne contient pas que des lettres.";
            }
        }

        foreach (substr_count($strLower,1) as $i=>$val){
            return $val;
        }



    }

    // Exercice 2
    public function panier($tab)
    {




    }
}