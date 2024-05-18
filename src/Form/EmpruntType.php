<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Etudiant;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etudiant', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => 'nom', // ou 'prenom' ou toute autre propriété à afficher
                'label' => 'Nom de l\'étudiant',
                'attr' => ['class' => 'form-control']
            ])
            ->add('livre', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => 'nomLivre', // ou toute autre propriété à afficher
                'label' => 'Nom du livre',
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateEmprunt', DateType::class, [
                'label' => 'Date d\'emprunt',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateRetour', DateType::class, [
                'label' => 'Date de retour',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
