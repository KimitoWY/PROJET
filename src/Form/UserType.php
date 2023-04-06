<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login',
                TextType::class, [
                    'label' => 'Login',
                    'required' => true
                ])
            ->add('password',
                PasswordType::class, [
                    'label' => 'Mot de passe',
                    'required' => true
                ])
            ->add('nom',
                TextType::class, [
                    'label' => 'Nom',
                    'required' => true
                ])
            ->add('prenom',
                TextType::class, [
                    'label' => 'Prénom',
                    'required' => true
                ])
            ->add('birthday',
                DateType::class, [
                    'label' => 'Date de naissance',
                    'years' => range(date('Y'), 1923)
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
