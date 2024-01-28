<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ['required'=>true, 'label'=>'Image'])    
            ->remove('imageName')
            // L'option data permet de définir une valeur affichée par défaut
            ->add('rankNumber', IntegerType::class, ['required'=>true, 'data'=>1, "attr"=>["min"=>1]])
            ->remove('updatedAt')
        ;
        if(!$options["fromBook"]){
            $builder
            // Pour rappel choice_label permet de choisir le champ qui sera affiché dans le select
            // Auquel cas on n'a pas besoin de la méthode __toString() dans l'entité
            ->add('livre', EntityType::class, ["class"=>Livre::class, "choice_label"=>'title']) 
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
            'fromBook'=>false,
        ]);
    }
}
