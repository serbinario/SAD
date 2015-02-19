<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OpcoesareadesejadaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('opcaoareadesejada', 'text', array(
                'label' => 'Área desejada',           
                'attr' => array(
                    'placeholder' => 'Área desejada',
                    'widget_col'=> '8',
                ))) 
            ->add('cagoopcaoareadesejada', 'text', array(
                'label' => 'Cargo desejado',           
                'attr' => array(
                    'placeholder' => 'Cargo desejado',
                    'widget_col'=> '8',
                )))             
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Opcoesareadesejada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_opcoesareadesejada';
    }
}
