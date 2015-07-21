<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormacaoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grauformacao', 'text', array(
                'label' => 'Grau da Formação',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Grau da Formação',
                    'widget_col'=> '6',
                ))) 
            ->add('nomecursoformacao', 'text', array(
                'label' => 'Nome do Curso',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Nome do Curso',
                    'widget_col'=> '6',
                ))) 
            ->add('instituicaoformacao', 'text', array(
                'label' => 'Instituição',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Instituição de ensino',
                    'widget_col'=> '8',
                ))) 
            ->add('datainicioformacao', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Período Inicial',
                'attr' => array(
                    'placeholder' => 'Período Inicial',
                    'widget_col'=> '4',
                    'class' => ' datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
                )))
            ->add('dataconclusaoformacao', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Perído Final',
                'attr' => array(
                    'placeholder' => 'Perído Final',
                    'widget_col'=> '4',
                    'class' => ' datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
                )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Formacao'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_formacao';
    }
}
