<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CnhType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('validadecnh', 'text', array(
                'label' => 'Validade CNH',
                'required' => false,
                'attr' => array(
                    'widget_col'=> '4',
                    'placeholder' => 'Validade CNH',
                )))
            ->add('categoriacnh', 'text', array(
                'label' => 'Categoria CNH',
                'required' => false,
                'attr' => array(
                    'widget_col'=> '4',
                    'placeholder' => 'Categoria CNH',
                )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Cnh'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_cnh';
    }
}
