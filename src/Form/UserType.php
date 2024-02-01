<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AvatarType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avatar', AvatarType::class, ['label' => false])    
            ->add('email')
            ->remove('roles')
            ->remove('password')
            // ->add('password')
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => false,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirm password'],
                'mapped' => false,
                'help' => 'Le mot de passe doit contenir 6 caractères minimum.'
            ])
            ->add('name')
            ->add('lastname')
            ->add('adress1')
            ->add('adress2')
            ->add('postalCode')
            ->add('city')
            ->add('country', CountryType::class, [
                'preferred_choices' => ['AO']])
            ->add('tel')
            ->remove('isVerified')
            ->add('modified', SubmitType::class, ["attr"=>["class"=>"btn btn-dark mt-3"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
