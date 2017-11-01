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

class AnnuaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  )
            ))
            ->add('quartier', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  )
            ))
            ->add('situation', null, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      'row' => 5,
                  )
            ))
            ->add('localisation', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                  ),
                  'required' => false
            ))
            ->add('boitePostale', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('tel', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('cel', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('facebook', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('linked', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('google', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('twitter', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('website', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('instagram', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('pinterest', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off',
                      //'placeholder' => 'Titre de l\'article'
                  ),
                  'required' => false
            ))
            ->add('tag', null, array(
                  'attr'  => array(
                      'class' => 'form-control tag-input',
                      'data-role' => "tagsinput",
                  )
            ))
            ->add('statut')
            //->add('imageName')->add('imageSize')->add('updatedAt')->add('slug')->add('publiePar')->add('modifiePar')->add('publieLe')->add('modifieLe')
            ->add('domaine', null, array(
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
            'data_class' => 'AppBundle\Entity\Annuaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_annuaire';
    }


}
