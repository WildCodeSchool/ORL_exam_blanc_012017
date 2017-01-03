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
        $str = "Seul, on va plus vite, ensemble, on va plus loin";
        $str=str_replace(',','',$str);

        $arr1 = str_split($str);
        print_r ($arr1);
        echo (ksort($arr1));



        foreach (count_chars($str, 1) as $i => $val) {
            echo "Il y a $val occurence(s) de \"" , chr($i) , "\" dans la phrase.\n<br />";
        }
    }



    }

    // Exercice 2
    public function panier($tab)
    {


    }
}