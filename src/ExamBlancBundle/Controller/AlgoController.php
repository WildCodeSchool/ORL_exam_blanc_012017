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
        $result=null;

        $str=strtolower($str);
        for($i=97; $i<=122; $i++){
            if(substr_count($str, chr($i))!=0) {
                $result[chr($i)] = substr_count($str, chr($i));
            }
        }
        return $result;
    }

    // Exercice 2
    public function panier($tab)
    {
        $total_ht=$total_tva5=$total_tva20=$total_discount=0;
        foreach ($tab as $item) {
            $total_ht+=$item[1]*$item[3];
            if($item[2] == 1){
                $total_tva5+=($item[1]*$item[3])*0.05;
            }else{
                $total_tva20+=($item[1]*$item[3])*0.2;
            }
            if($item[3] > 9){
                $total_discount+=$item[1]*$item[3]*0.1;
                $total_ht-=$item[1]*$item[3]*0.1;
            }elseif($item[3] > 2){
                $total_discount+=$item[1]*$item[3]*0.05;
                $total_ht-=$item[1]*$item[3]*0.05;
            }
        }
        $total_ttc=$total_ht+ $total_tva5+ $total_tva20;
        $result = array('total_ht'=>$total_ht,'total_discount'=>$total_discount,'total_tva5'=>$total_tva5,'total_tva20'=>$total_tva20,'total_ttc'=>$total_ttc);
        return $result;

    }
}