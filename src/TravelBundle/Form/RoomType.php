<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roomNumber', ChoiceType::class, array(
                '1' => null,
                '2' => null,
                '3' => null,
                '4' => null,
                '5' => null,
                '6' => null,
                '7' => null,
                '8' => null,
                '9' => null,
                '10' => null,
                '11' => null,
                '12' => null,
                '13' => null,
                '14' => null,
                '15' => null,
                '16' => null,
                '17' => null,
            ))
            ->add('capacity')
            ->add('book')
            ->add('hotel')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelBundle\Entity\Room'
        ));
    }
}
