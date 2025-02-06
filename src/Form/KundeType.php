<?php declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KundeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('material_1', TextType::class, [
                'label' => 'Säule 1',
                'attr' => [
                    'class' => 'form-lage--textfield',
                    'placeholder' => '',
                ],
            ])
            ->add('material_2', TextType::class, [
                'label' => 'Säule 2',
                'attr' => [
                    'class' => 'form-lage--textfield',
                    'placeholder' => '',
                ],
            ])
            ->add('material_3', TextType::class, [
                'label' => 'Säule 3',
                'attr' => [
                    'class' => 'form-lage--textfield',
                    'placeholder' => '',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Senden',
                'attr' => [
                    'class' => 'lage__form_button main-button',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}