<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QualificacaofuturaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descricaoqualificacaofutura', 'textarea', array(
                'label' => "Descrição da Qualificação",
                'required' => false,
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Descrição da Qualificação',
                    )
                ))
            ->add('tipoqualificacaofuturatipoqualificacaofutura','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacaofutura',
                'empty_value' => "Selecione o tipo",
                'label' => 'Tipo qualificação',
                'required' => false,
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Qualificacaofutura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_qualificacaofutura';
    }
}
