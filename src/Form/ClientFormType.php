<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null , ['required'   => false ])
            ->add('prenom', null , ['required'   => false ])
            ->add('telephone', null , ['required'   => false ])
            ->add('mobile', null , ['required'   => false ])
            ->add('adrresse', null , ['required'   => false ])
            ->add('ville', null , ['required'   => false ])
            ->add('wilaya', null , ['required'   => false ])
            ->add('Blocked')
            ->add('raison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
