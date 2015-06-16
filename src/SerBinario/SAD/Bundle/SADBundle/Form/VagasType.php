<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VagasType extends AbstractType
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
                'empty_value' => "Selecione a área profissional",
                'label' => 'Área profissional',        
                'attr' => array(
                    'widget_col'=> '5',
                ))) 
            ->add('nomeVaga', 'text', array(
            'label' => 'Nome',           
            'attr' => array(
                'placeholder' => 'Nome da Vaga',
                'widget_col'=> '5',
            )))
            ->add('actions', 'form_actions', [
                'buttons' => [
                    'save' => ['type' => 'submit', 'options' => ['label' => 'Salvar']],
                    'cancel' => ['type' => 'button', 'options' => ['label' => 'Cancelar']],
                ]
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Vagas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_vagas';
    }
}
