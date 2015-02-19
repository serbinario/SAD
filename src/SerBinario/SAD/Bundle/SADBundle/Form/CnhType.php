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
                'label' => 'validade CNH',              
                'attr' => array(
                    'widget_col'=> '4',
                    'placeholder' => 'Nome do candidato',
                )))
            ->add('categoriacnh', 'text', array(
                'label' => 'Categoria CNH',              
                'attr' => array(
                    'widget_col'=> '4',
                    'placeholder' => 'Nome do candidato',
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
