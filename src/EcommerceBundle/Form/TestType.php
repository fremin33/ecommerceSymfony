<?php

namespace EcommerceBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ici nous allons faire notre formulaire en php
        $builder
            ->add('nom')
            ->add('description')
            ->add('Envoyer', SubmitType::class);
    }
}