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
		if (preg_match('/[a-x]/',$str, $char)){
		     $result = count_chars(implode($char));
		     return $result;
          }
		else {
			return 'nothing';
}
    }

    // Exercice 2
    public function panier($tab)
    {
	    $total_ht = $tab[1] * $tab[3];

    	     $remise1 = $total_ht * 0.05;
    	     $remise2 = $total_ht * 0.1;
    	     $tva1 = $remise1 * 0.05;
    	     $tva2 = $remise1 * 0.2;
    	     $tva3 = $remise2 * 0.05;
    	     $tva4 = $remise2 * 0.2;
    	     $tva5 = $total_ht * 0.05;
    	     $tva6 = $total_ht * 0.2;
	    foreach ($tab as $key => $item) {

			if ($tab[3] < 3 and $tab[2] = 1){
				return $tva5;
			}

			elseif ($tab[3] < 3 and $tab[2] = 2){
				return $tva6;
	          }

			elseif ($tab[3]  >=3 && $tab[3] <5 and $tab[2] = 1){
				return $tva1;
			}

			elseif ($tab[3]  >=3 && $tab[3] <5 and $tab[2] = 2){
				return $tva2;
			}

			elseif ($tab[3]  >=5 and $tab[2] = 1){
				return $tva3;
			}

			elseif ($tab[3]  >=5 and $tab[2] = 2){
				return $tva4;
			}

	    }

    }
}