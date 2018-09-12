<?php

namespace App\Form;

use App\Entity\Consommation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsommationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nouvelindex')
            ->add('ancienindex')
            ->add('datereleve')
            ->add('facturation')
            ->add('agent')
            ->add('compteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consommation::class,
        ]);
    }
}
