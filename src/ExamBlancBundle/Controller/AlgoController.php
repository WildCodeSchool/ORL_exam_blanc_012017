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
        $str = strtolower($str);
        $tab = str_split($str);
        $tabletters = [];
        foreach ($tab as $char) {
            if (ctype_alnum($char) === true) {
                $tabletters[] = $char;
            }
        }
        sort($tabletters);
        $result = array_count_values($tabletters);
        return $result;

    }

    // Exercice 2
    public function panier($tab)
    {


    }
}