<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('mail_adress')
            ->add('pseudo')
            ->add('birthday')
            ->add('sex', ChoiceType::class, [
                "choices" => $this->getChoices()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    private function getChoices(){
        $choices = User::SEX;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] =$k;
        }

        return $output;
    }
}