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
        var_dump($str);
        $str = strtolower($str);
        $str = str_replace(' ','',$str);
        $letters=str_split($str);
        $res=[];
        $i = 1;
        foreach ($letters as $key => $letter) {
            if(preg_match("/^[a-z]$/",$letter)){

                if($key>1 && array_key_exists($letter,$res)){
                    $i++;
                }else {
//                $i++;
                    $res = [$letter => $i];
//                $res = arsort($res);
                    var_dump($res);
                }
            }
        }
        return $res;

    }

    // Exercice 2
    public function panier($tab)
    {
        $totalHT =0;
        $facture=[];
        $articleHT=0;
        $articleTTC=0;
        $articleTVA5=0;
        $articleTVA20=0;
        $articleDiscount=0;
        $totalDiscount=0;
        $totalTVA5=0;
        $totalTVA20=0;
        $totalTTC=0;
        $tva = [1=>0.05,2=>0.2];
        foreach ($tab as $key=> $item) {
            if($item["qty"]>=3 && $item["qty"]<10){
                $articleDiscount = $item["price_ht"]*$item["qty"]*0.05;
                $articleHT = ($item["price_ht"]*$item["qty"])-$articleDiscount;

            }elseif($item["qty"]>=10){
                $articleDiscount = $item["price_ht"]*$item["qty"]*0.1;
                $articleHT = ($item["price_ht"]*$item["qty"])-$articleDiscount;

            }else{
                $articleDiscount = 0;
                $articleHT = $item["price_ht"]*$item["qty"];
            }
            //var_dump($totalTVA5);
            if($item['code_tva'] == 1){
                //var_dump($articleHT*($tva[$item['code_tva']]));
                $articleTVA5 = $articleHT*($tva[$item['code_tva']]);
                //var_dump($articleTVA5);
                $articleTTC = $articleHT+$articleTVA5;
            }elseif($item['code_tva'] == 2){

                $articleTVA20 = $articleHT*($tva[$item['code_tva']]);
                //var_dump($articleTVA20);
                $articleTTC = $articleHT+$articleTVA20;
            }

            $totalHT += $articleHT;
            $totalDiscount +=abs($articleDiscount);
            $totalTVA5 += $articleTVA5;
            $totalTVA20 += $articleTVA20;
            $totalTTC += $articleTTC;
        }
        $facture=['total_ht'=>round($totalHT,2),'total_discount'=>round($totalDiscount,2),'total_tva5'=>round($totalTVA5,2),'total_tva20'=>round($totalTVA20,2),'total_ttc'=>round($totalTTC,2)];
        var_dump($facture);
        return $facture;
    }
}