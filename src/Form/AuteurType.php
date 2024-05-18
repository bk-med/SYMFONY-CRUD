<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'auteur',
                'required' => true,
            ])
            ->add('email', TextType::class, [
                'label' => 'Email de l\'auteur',
                'required' => true,
            ])
            ->add('livre', TextType::class, [
                'label' => 'Livre de l\'auteur',
                'required' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Image de l\'auteur',
                'required' => false, // Le champ n'est pas obligatoire
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid JPEG or PNG image',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class, // Assurez-vous que la classe est correcte ici
        ]);
    }
}
