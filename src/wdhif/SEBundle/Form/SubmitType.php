<?php

namespace wdhif\SEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SubmitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', 'text', array(
                'attr' => array(
                    'class' => 'search inputSearch',
                )
            ))
            ->add('submiturl', 'submit', array(
                'label' => 'submit',
                'attr' => array(
                    'class' => 'btn btn-large btn-success',
                )
            ));
    }

    public function getName()
    {
        return 'url';
    }
}