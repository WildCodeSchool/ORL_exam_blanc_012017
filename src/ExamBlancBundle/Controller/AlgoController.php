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
        $str = str_replace(' ', '', $str);
        $letters = preg_replace('/[^a-z_]/', '', $str);

        $arr_letters = str_split($letters);
        $result = array_count_values($arr_letters);

        return count($result).arsort($result);

    }

    // Exercice 2
    public function panier($panier)
    {
        $total_ht = 0;
        $total_discount= 0;
        $total_tva5 = 0;
        $total_tva20 = 0;

        setlocale(LC_MONETARY,"de_DE");

        foreach ($panier as $values) {
            $total_ht += $values[1];
            $result['total_ht'] = $total_ht;
        }
        
        foreach ($panier as $values) {
            if ($values[3] > 3 && $values[3] < 10) {
                $result['total_discount'] += ($values[2]*(5/100))*$values[3];

            } elseif ($values[3] >10) {
                $result['total_discount'] += ($values[2]*(10/100))*$values[3];
            }
        }

        foreach ($panier as $values) {
            if ($values[2] == 1 ) {
                $result['total_tva5'] += ($values[2]*(5/100))*$result['total_discount'];
                $result['total_ttc'] = ($result['total_ht'] - $result['total_discount'] ) *  $result['total_tva5'];

            } elseif ($values[2] == 2) {
                $result['total_tva20'] += ($values[2]*(20/100))*$result['total_discount'];
                $result['total_ttc'] = (round($result['total_ht']) - round($result['total_discount']) ) *  round($result['total_tva20']);
            }
        }
        return money_format("%.2n", $result);
    }
}