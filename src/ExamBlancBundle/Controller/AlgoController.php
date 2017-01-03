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
        $strToTab = str_split(strtolower(preg_replace('#[^A-Za-z]+#', '', $str)));
        $count = array_count_values($strToTab);
        return arsort($count);

    }

    // Exercice 2
    public function panier($tab)
    {

        $pannier = array([name => '', price_ht => '', code_tva => '', qty => '']);
        $total_discount = 0;
        $total_ht = 0;
        $total_tva5 = 0;
        $total_tva20 = 0;
        $total_ttc = 0;

        foreach ($pannier as $article) {

            $total_tva5 =0;
            $total_tva20 =0;

            foreach ($article as $value) {

                $prix_ht = 0;
                $tva5 = 0;
                $tva20 = 0;


                if ($value[qty] < 3) {
                    $prix_ht = $value[price_ht] * $value[qty];
                } elseif ($value[qty] < 10) {
                    $prix_ht = ($value[price_ht] * $value[qty]) * 0.95;

                } else
                    $prix_ht = ($value[price_ht] * $value[qty]) * 0.90;

                if ($value[code_tva] = 1) {
                    $tva5 = $prix_ht * 0.05;
                } else $tva20 = $prix_ht * 0.2;

                $total_ht += $prix_ht;
                $total_tva5 += $tva5;
                $total_tva20 += $tva20;
            }

            $total_discount += $total_tva5 + $total_tva20;
            $total_ttc += $total_discount + $total_ht;

        }

        return [total_ht => $total_ht,total_discount => $total_discount,total_tva5 => $total_tva5, total_tva20 => $total_tva20, total_ttc => $total_ttc];


    }
}