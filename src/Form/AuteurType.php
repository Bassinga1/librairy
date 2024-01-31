<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ["required"=>false, "label"=>"Image"])    
            ->add('pseudo', TextType::class, ["required"=>false])
            ->add('name', TextType::class, ["required"=>false])
            ->add('lastname', TextType::class, ["required"=>false])
            ->add('biography', CKEditorType::class, ["required"=>false])
            ->remove('imageName')
            ->remove('updatedAt')
            ->remove('slug')
            ->add('livres', EntityType::class, ["class"=>Livre::class, "multiple"=>true, "required"=>false, "attr"=>["class"=>"select2"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}
