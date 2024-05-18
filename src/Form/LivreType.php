<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Auteur;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLivre', TextType::class, [
                'label' => 'Nom du Livre',
            ])
            ->add('reference', TextType::class, [
                'label' => 'Référence',
            ])
            ->add('ouvrage', TextType::class, [
                'label' => 'Ouvrage',
            ])
            ->add('anneePublication', DateType::class, [
                'label' => 'Année de publication',
                'widget' => 'single_text',
                // 'format' => 'yyyy-MM-dd', // Optionnel : spécifiez un format personnalisé si nécessaire
            ])
            ->add('auteur', EntityType::class, [
                'label' => 'Auteur',
                'class' => Auteur::class,
                'choice_label' => 'nom', // Le champ à utiliser comme libellé dans le formulaire
                'placeholder' => 'Sélectionnez un auteur', // Texte par défaut affiché dans le champ select
            ])
            
            ->add('image', FileType::class, [
                'label' => 'Image du livre',
                'required' => false, // Permet de ne pas rendre obligatoire le champ image
                'mapped' => false, // Ne pas mapper directement au champ image de l'entité
            ])
    
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
