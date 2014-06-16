<?php

namespace wdhif\SEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', 'text', array(
                'attr' => array(
                    'class' => 'search inputSearch',
                )
            ))
            ->add('submit', 'submit', array(
                'label' => 'Go',
                'attr' => array(
                    'class' => 'btn btn-large btn-success',
                )
            ));
    }

    public function getName()
    {
        return 'search';
    }
}