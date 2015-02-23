<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExperienciaprofissionalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomedaempresaexperienciaprofissional', 'text', array(
                'label' => 'Experiência Profissional',           
                'attr' => array(
                    'placeholder' => 'Experiência Profissional',
                    'widget_col'=> '4',
                ))) 
            ->add('ultimocargoexperienciaprofissional', 'text', array(
                'label' => 'Ultima cargo',           
                'attr' => array(
                    'placeholder' => 'Ultima cargo',
                    'widget_col'=> '4',
                ))) 
            ->add('ultimosalarioexperienciaprofissional', 'text', array(
                'label' => 'Ultima salário',           
                'attr' => array(
                    'placeholder' => 'Ultima salário',
                    'widget_col'=> '4',
                ))) 
            ->add('dataadmissaoexperienciaprofissional', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Data de Admissão',        
                'attr' => array(
                    'placeholder' => 'Data Admissão',
                    'widget_col'=> '4',
                    'class' => 'datepicker'
                )
            ))
            ->add('datademissaoexperienciaprofissional', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Data da Demissão',        
                'attr' => array(
                    'placeholder' => 'Data da Demissão',
                    'widget_col'=> '4',
                    'class' => 'datepicker'
                )
            ))
            ->add('atribuicoesexperienciaprofissional', 'textarea', array(
                'label' => "Atribuições/Realizações",                        
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Atribuições/Realizações',
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Experienciaprofissional'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_experienciaprofissional';
    }
}
