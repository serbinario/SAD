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
                'attr' => array(
                    'placeholder' => 'Grau da Formação',
                    'widget_col'=> '6',
                ))) 
            ->add('nomecursoformacao', 'text', array(
                'label' => 'Nome do Curso',           
                'attr' => array(
                    'placeholder' => 'Nome do Curso',
                    'widget_col'=> '6',
                ))) 
            ->add('instituicaoformacao', 'text', array(
                'label' => 'Instituição',           
                'attr' => array(
                    'placeholder' => 'Instituição de ensino',
                    'widget_col'=> '8',
                ))) 
            ->add('datainicioformacao', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Data Início',
                'attr' => array(
                    'placeholder' => 'Data de Início',
                    'widget_col'=> '4',
                    'class' => ' datepicker '
                )))
            ->add('dataconclusaoformacao', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Data Conclusão',
                'attr' => array(
                    'placeholder' => 'Data Conclusão',
                    'widget_col'=> '4',
                    'class' => ' datepicker '
                )))
            ->add('anocursandoformacao', 'text', array(
                'label' => 'Ano Cursando',           
                'attr' => array(
                    'placeholder' => 'Ano Cursando',
                    'widget_col'=> '4',
                ))) 
            ->add('ultimaformacao', 'text', array(
                'label' => 'Ultima Formação',           
                'attr' => array(
                    'placeholder' => 'Ultima Formação',
                    'widget_col'=> '4',
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
