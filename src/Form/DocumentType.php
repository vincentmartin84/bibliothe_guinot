<?php

namespace App\Form;

use App\Entity\Document;
use App\Entity\Images;
use App\Entity\Support;
use App\Entity\Genre;
use App\Entity\Consultation; 
use App\Entity\Available;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('author')
            ->add(
                'releasedate',  DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['min' => '0-01-01'],
                ]
            )            
            ->add('support')
            ->add('genre')
            ->add('consultation')
            ->add('available')
            ->add(
                'images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                //'class' => Images::class,
                'required' => false
                ]
            ); 

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
            'data_class' => Document::class,
            ]
        );
    }
}
