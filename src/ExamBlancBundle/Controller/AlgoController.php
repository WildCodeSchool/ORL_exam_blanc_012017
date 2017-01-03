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
        $str = str_replace("-", '', $str);
        $str = str_replace(' ', '', $str);
        $str = preg_replace('/[^a-z0-9\-]/', '', $str);
//        $str = str_replace(',', '', $str);
//        $str = str_replace("'", '', $str);
//        $str = str_replace(".", '', $str);
//        $str = str_replace("ê", '', $str);
//        $str = str_replace("é", '', $str);
        $str = str_split($str);

        foreach ($str as $value) {
            $letter[] = $value;
        }

        sort($letter);
        $result = array_count_values($letter);
        print_r($result);
        return $result;
    }

    // Exercice 2
    public function panier($tab)
    {


    }
}