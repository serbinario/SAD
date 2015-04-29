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
            ->add('areaDesejada', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada',
                'required' => false,
                'empty_value' => "Selecione a área",
                'label' => 'Área desejada',        
                'attr' => array(
                    'widget_col'=> '5',
                ))) 
            ->add('funcao', 'entity', array(
                'required' => false,
                'label' => 'Cargo desejado',
                'empty_value' => "Selecione o cargo",
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Funcao',
                'attr' => array(
                    'widget_col'=> '5',
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
