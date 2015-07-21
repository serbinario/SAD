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
                'label' => 'Nome da Empresa',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Nome da Empresa',
                    'widget_col'=> '4',
                ))) 
            ->add('ultimocargoexperienciaprofissional', 'text', array(
                'label' => 'Cargo/Função',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Cargo/Função',
                    'widget_col'=> '4',
                ))) 
            ->add('ultimosalarioexperienciaprofissional', 'text', array(
                'label' => 'Salário',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Salário',
                    'widget_col'=> '4',
                ))) 
            ->add('dataadmissaoexperienciaprofissional', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Data de Admissão',        
                'attr' => array(
                    'placeholder' => 'Data Admissão',
                    'widget_col'=> '4',
                    'class' => 'datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
                )
            ))
            ->add('datademissaoexperienciaprofissional', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Data da Demissão',        
                'attr' => array(
                    'placeholder' => 'Data da Demissão',
                    'widget_col'=> '4',
                    'class' => 'datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
                )
            ))
            ->add('atribuicoesexperienciaprofissional', 'textarea', array(
                'label' => "Atribuições/Realizações",
                'required' => false,
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
