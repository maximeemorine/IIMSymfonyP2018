<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GradeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grade', 'integer', array('label' => 'Note'))
            ->add('comment', 'text', array('label' => 'Commentaire'))
            ->add('user', 'entity', array(
                'label' => 'Éleve',
                'class' => 'AppBundle:User',
                'property' => 'fullname', // getFullname()
                'expanded' => false,
                'multiple' => false
            ))
            ->add('lesson', 'entity', array(
                'label' => 'Leçon',
                'class' => 'AppBundle:Lesson',
                'property' => 'title', 
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
            'data_class' => 'AppBundle\Entity\Grade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_grade';
    }
}
