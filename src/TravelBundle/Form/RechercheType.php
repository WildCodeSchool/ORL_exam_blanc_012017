<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stars', ChoiceType::class, [
                'choices'=>[
                    '1 étoile'=>1,
                    '2 étoiles'=>2,
                    '3 étoiles'=>3,
                    '4 étoiles'=>4,
                    '5 étoiles'=>5,
                ]
            ])
            ->add('city')
            ->add('nbRoom')
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'travel_bundle_recherche_type';
    }
}
