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
        $result = Array(
            'total_ht' => 0,
            'total_discount' => 0,
            'total_tva5' => 0,
            'total_tva20' => 0,
            'total_ttc' => 0,
        );
        foreach ($tab as $product) {
            $tva1 = $tva2 = 0;
            if ($product['qty'] < 3) {
                $prixht = $result['total_ht'] += $product['price_ht']*$product['qty'];
                if ($product['code_tva'] == 1) {
                    $tva1 += $result['total_tva5'] += ($product['price_ht']*0.05)*$product['qty'];
                } else {
                    $tva2 += $result['total_tva20'] += ($product['price_ht']*0.2)*$product['qty'];
                }
                $result['total_ttc'] = $prixht + $tva1 + $tva2;
            } elseif ($product['qty'] < 10){
                $discount = ($product['price_ht']*0.05)*$product['qty'];
                $result['total_discount'] += $discount;
                $prixht = $result['total_ht'] += ($product['price_ht']*$product['qty'])-$discount;
                if ($product['code_tva'] == 1) {
                    $tva1 += $result['total_tva5'] += (($product['price_ht']*0.05)*0.05)*$product['qty'];
                } else {
                    $tva2 += $result['total_tva20'] += (($product['price_ht']*0.05)*0.2)*$product['qty'];
                }
                $result['total_ttc'] = $prixht + $tva1 +$tva2;

            } else {
                $discount = ($product['price_ht']*0.1)*$product['qty'];
                $result['total_discount'] += $discount;
                $prixht = $result['total_ht'] += ($product['price_ht']*$product['qty'])-$discount;
                if ($product['code_tva'] == 1) {
                    $tva1 += $result['total_tva5'] += (($product['price_ht']*0.1)*0.05)*$product['qty'];
                } else {
                    $tva2 += $result['total_tva20'] += (($product['price_ht']*0.1)*0.2)*$product['qty'];
                }
                $result['total_ttc'] = $prixht + $tva1 + $tva2;

            }
        }
        return $result;
    }
}