<?php

namespace ExamBlancBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlgoController extends Controller
{
    //////////////////////////////////////
    // Complète les fonctions suivantes //
    //////////////////////////////////////

    // Exercice 1

  //      $str = "Seul, on va plus vite, ensemble, on va plus loin";
   //     $arr1 = str_split($str);
    //    echo ($arr1);

        function mb_count_chars($str)
        {
            $str = "Seul, on va plus vite, ensemble, on va plus loin";
            $l = mb_strlen($str, 'UTF-8');
            $unique = array();
            for($i = 0; $i < $l; $i++) {
                $char = mb_substr($input, $i, 1, 'UTF-8');
                if(!array_key_exists($char, $unique))
                    $unique[$char] = 0;
                $unique[$char]++;
            }
            return $unique;
        }


        echo ( mb_count_chars($str);



    // Exercice 2
    public function panier($tab)
    {


    }
}