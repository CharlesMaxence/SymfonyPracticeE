<?php

namespace App\Form;

use App\Entity\image;
use App\Entity\SlideShow;
use App\Entity\Theme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlideShowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('image', EntityType::class, [
                'class' => image::class,
                'choice_label' => 'id',
            ])
            ->add('Theme', EntityType::class, [
                'class' => Theme::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SlideShow::class,
        ]);
    }
}
