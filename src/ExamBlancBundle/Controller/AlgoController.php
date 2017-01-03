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
        $table_of_letter = str_split($str);
        $minuscule = strtolower($table_of_letter);
    }

    // Exercice 2
    public function panier($tab)
    {
        $ht = array_sum ($tab);
        $ttc = $ht * 1.2;
        if(code_tva = 1){
            return $ht * 1.05;
        }
        else(code_tva = 2){
            return $ht * 1.20;
        }
    }