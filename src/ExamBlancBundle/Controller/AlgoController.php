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
        $str = strtolower(preg_replace('/[^a-z]+/i', '', $str));
        foreach (count_chars($str,1) as $lettre => $count) {
            $array[chr($lettre)] = $count;
        }
        return $array;
    }

    // Exercice 2
    public function panier($tab)
    {   $ht=0;
        $ttc=0;
        
        for($i = 0; $i < count($tab); $i++) {
            if ($tab[$i]['code_tva'] == 1) {
                if ($tab[$i]['qty'] >= 3 && $tab[$i]['qty'] <= 10) {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']) * 0.95;
                    
                } elseif ($tab[$i]['qty'] >= 10) {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']) * 0.90;
                } else {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']);
                }
                $ttc += ($ht * 0.05) + $ht;
            } elseif($tab[$i]['code_tva'] == 2) {
                if ($tab[$i]['qty'] >= 3 && $tab[$i]['qty'] <= 10) {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']) * 0.95;

                } elseif ($tab[$i]['qty'] >= 10) {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']) * 0.90;
                } else {
                    $ht += ($tab[$i]['price_ht'] * $tab[$i]['qty']);
                }
                $ttc += ($ht * 0.20) + $ht;
            }
        }
        
        var_dump($ht);
        var_dump($ttc);
    }
}