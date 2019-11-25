<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\DevellopementStudio;
use App\Entity\Platform;
use App\Entity\Publisher;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('descritpion')
            ->add('note')
            ->add('editor', EntityType::class, [
                'class' => Publisher::class,
                'choice_label' => 'name',
                'multiple' => false,
            ])
            ->add('development_studio', EntityType::class, [
                'class' => DevellopementStudio::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('platform', EntityType::class, [
                'class' => Platform::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
