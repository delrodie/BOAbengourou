<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class InformationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'L\'intitulé de l\' information'
                  )
            ))
            ->add('statut')
            ->add('datedebut', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Debut publication'
                  )
            ))
            ->add('datefin', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'placeholder' => 'Fin publication'
                  )
            ))
            //->add('slug')->add('publiePar')->add('modifiePar')->add('publieLe')->add('modifieLe')
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Information'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_information';
    }


}
