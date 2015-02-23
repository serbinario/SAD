<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReferenciaprofissionalautonomoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomereferenciaprofissionalautonomo', 'text', array(
                'label' => 'Nome Referência',           
                'attr' => array(
                    'placeholder' => 'Nome Referência',
                    'widget_col'=> '6',
                ))) 
            ->add('telefonereferenciaprofissionalautonomo', 'text', array(
                'label' => 'Telefone Referência',           
                'attr' => array(
                    'placeholder' => 'Telefone Referência',
                    'widget_col'=> '6',
                ))) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Referenciaprofissionalautonomo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_referenciaprofissionalautonomo';
    }
}
