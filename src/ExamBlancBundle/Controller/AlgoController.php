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
        $str= array("Seul, on va plus vite,ensemble, on va plus loin");
        arsort($str);
        count($str);

        return $str;


    }

    // Exercice 2
    public function panier($tab)
    {

    }
}