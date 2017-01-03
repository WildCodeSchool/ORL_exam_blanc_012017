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
     $str =strtolower($str);

     $chr = str_split($str);
     $letters =0;
     foreach($chr as $key => $value){
        if ($chr[$key] == $chr[$key]){
            $letters[] += 1;
        }
        return arsort($letters);
     }

    }

    // Exercice 2
    public function panier($tab)
    {
        foreach ($tab){

        if($tab[$qty]>=3){
           $HT = 0.05*$price_ht;
           $TVA1= $tab[$code_tva]*$tab[$HT]
        }
        elseif($tab[$qty]>=10){
            $HT = 0.10*$price_ht;
            $TVA2= $tab[$code_tva]*$tab[$HT]
        }
        foreach ($tab){
            return $Results = array( "HTtotal"=> $tab[$qty]*[$HT],
                                "TVAtotal1"=> $TVA1,
                                "TVATotal2"=> $TVA2,
                                "TTCTotal" => $tab[$qty]*[$HT]*$qty);
                )



        }

        }
    }
}