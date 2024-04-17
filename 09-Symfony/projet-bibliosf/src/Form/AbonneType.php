<?php

namespace App\Form;

use App\Entity\Abonne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AbonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $abonne = $options["data"];
        $builder
            ->add('pseudo')
            // Ici le add role par defaut pense que c'est un input text, mais mon système attend un array (visible dans l'entité Abonne), je dois donc changer le type
            // Ici je décide donc de mettre un ChoiceType qui me permet de sélectionner des rôles parmis une liste
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    "Directeur" => "ROLE_ADMIN",
                    "Bibliothecaire" => "ROLE_BIBLIO",
                    "Lecteur" => "ROLE_LECTEUR"
                ],
                // multiple true, permet de laisser la possibilité de plusieurs valeurs dans le champs (car c'est un array)
                "multiple" => true,
                "expanded" => true
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    // new NotBlank([
                    //     'message' => 'Please enter a password',
                    // ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'required' => $abonne->getId() ? false : true
            ])
            ->add('prenom')
            ->add('nom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonne::class,
        ]);
    }
}
