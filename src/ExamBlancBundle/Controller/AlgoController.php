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
        $del = array("-",".","'"," ","ê","é","è",",");
        $str = str_replace($del , '',$str);
        $str = strtolower($str);
        $l = mb_strlen($str);
        $unique = array();
        for($i = 0; $i < $l; $i++) {
            $char = mb_substr($str, $i, 1);
            if(!array_key_exists($char, $unique))
                $unique[$char] = 0;
            $unique[$char]++;
        }
        return $unique;
    }

    // Exercice 2
    public function panier($tab)
    {
        $totalht = 0;
        foreach ($tab as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if ($key2 == 'price_ht') {
                    $totalht += $value2;
                    $totalht = round($totalht, 2);
                }
                elseif (($key2 == 'code_tva') and ($value2 = 2)) {
                    $tva1 = $totalht * 0.05;

                }
                elseif (($key2 == 'code_tva') and ($value2 = 1)) {
                    $tva2 = $totalht * 0.20;

                }
            }
        }

        return array($totalht, $tva1, $tva2);


    }
}