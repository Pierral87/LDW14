<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // La fonction add permet d'ajouter un champ au formulaire, seul le premier param est obligatoire, c'est le nom que l'on donnera au champ (qui servira de label par défaut), deuxième argument c'est le type d'input, troisième argument les options 
        // Par défaut les champs ajoutés sont required
        $builder
            ->add('titre', TextType::class, [
                "label" => "Titre du livre : ",
                "constraints" => [
                    new Length([
                        "min" => 4, 
                        "minMessage" => "Le titre doit faire au moins 4 caractères",
                        "max" => 50, 
                        "maxMessage" => "Le titre doit faire moins de 50 caractères"
                    ]),
                    new NotBlank([
                        "message" => "Le titre est obligatoire"
                    ])
                ]
            ])
            ->add('auteur', TextType::class, [
                "label" => "Nom de l'auteur : "
            ])
            ->add("enregistrer", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-secondary"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
