<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Vich\UploaderBundle\Form\Type\VichImageType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class AgendaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Titre de l\'evenement'
                  )
            ))
            ->add('datevent', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Date debut de l\'evenement'
                  )
            ))
            ->add('finevent', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Date fin de l\'evenement'
                  )
            ))
            ->add('resume', null, array(
                    'attr'  => array(
                        'class' => 'form-control',
                        'autocomplete'  => 'off',
                        'placeholder' => 'Resumé de l\'evenement',
                        'rows' => '5'
                    )
              ))
            ->add('description', CKEditorType::class)
            ->add('tag', null, array(
                  'attr'  => array(
                      'class' => 'form-control tag-input',
                      'data-role' => "tagsinput",
                  )
            ))
            ->add('lieu', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Lieu'
                  )
            ))
            ->add('datedebut', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Date debut de publication',
                      'name'  => 'start'
                  )
            ))
            ->add('datefin', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Date fin de publication',
                      'name'  => 'end'
                  )
            ))
            ->add('statut')
            //->add('imageName')->add('imageSize')->add('updatedAt')->add('slug')->add('publiePar')
            //->add('modifiePar')->add('publieLe')->add('modifieLe')
            ->add('typevent', null, array(
                  'attr'  => array(
                      'class' => 'form-control',
                  )
            ))
            ->add('imageFile', VichImageType::class, array(
                  'required' => false,
                  'allow_delete' => true,
              ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Agenda'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_agenda';
    }


}
