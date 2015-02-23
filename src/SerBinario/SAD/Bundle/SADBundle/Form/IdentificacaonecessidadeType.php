<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IdentificacaonecessidadeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('creditocredito', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Credito',
                'label' => 'Credito', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '3',
                    'inline' => true
                    )
                ))
            ->add('consultoria', 'text', array(
                'label' => 'Consultoria',           
                'attr' => array(
                    'placeholder' => 'Consultoria',
                    'widget_col'=> '6',
                ))) 
            
            ->add('capacitacaocapacitacao', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Capacitacao',
                'label' => 'Crédito', 
                'multiple' => false,
                'expanded' => false,          
                'attr' => array(
                    'widget_col'=> '3'                    
                    )
                ))          
            ->add('formalizacaoformalizacao', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Formalizacao',
                'label' => 'Qualificação', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '3',
                    'inline' => true
                    )
                ))          
            ->add('tipoqualificacaotipoqualificacao', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipoqualificacao',
                'label' => 'Formalização', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '6',
                    'inline' => true                   
                    )
                ))          
            ->add('historico', 'textarea', array(
                'label' => "Histórico",                        
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Histórico',
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaonecessidade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_identificacaonecessidade';
    }
}
