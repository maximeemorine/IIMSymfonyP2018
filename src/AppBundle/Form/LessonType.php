<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LessonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('description', 'text', array('label' => 'Description'))
            ->add('content', 'textarea', array(
                'label' => 'Contenu',
                'attr' => array('class' => 'tinymce-editor')
            ))
            ->add('author', 'entity', array(
                'label' => 'Auteur',
                'class' => 'AppBundle:User',
                'property' => 'fullname', // getFullname()
                'expanded' => false,
                'multiple' => false
            ))
            ->add('submit', 'submit', array('label' => 'Valider'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Lesson'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_lesson';
    }
}
