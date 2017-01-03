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
        $str=preg_replace('/([^a-zA-Z0-9\s\-=+\|!@#$%^&*()`~\[\]
                            {};:\'",<.>\/?])\s+([^a-zA-Z0-9\s\-=+\|!@#$%^&*()`~\[\]
                            {};:\'",<.>\/?])/', '', $str);
        $str=strtolower($str);
        $tab=array_count_values(str_split($str));
        return ($tab);
    }

    // Exercice 2
    public function panier($tab)
    {
        $tvaOne = 0.05;
        $tvaTwo = 0.2;
        $discountOne = 0.05;
        $discountTwo = 0.2;

        $total_ht = 0;
        foreach ($tab["price_ht"] as $price) {
            $total_ht += $price;
            return array($total_ht);
        }
    }

    public function testAction()
    {
        return $this->render('ExamBlancBundle:Algorithmique:test.html.twig');
    }
}