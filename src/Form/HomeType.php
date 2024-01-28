<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class,["required"=>false, "label"=>"Active", "attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch mb-2"]])
            ->add('title', TextType::class, ["required"=>true])
            ->add('text', CKEditorType::class, ["required"=>true])
            ->add('signature', TextType::class, ["required"=>false])
            ->remove('imageName')
            ->add('imageFile', FileType::class, ["required"=>false, "label"=>"Image", "attr"=>["class"=>"form-control"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
