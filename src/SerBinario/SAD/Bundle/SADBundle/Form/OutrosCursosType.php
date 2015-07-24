<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OutrosCursosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('instituicao', 'text', array(
                'label' => 'Nome da Instituição',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Nome da Instituição',
                    'widget_col'=> '6',
                )))
            ->add('curso', 'text', array(
                'label' => 'Curso',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Curso',
                    'widget_col'=> '6',
                )))
            ->add('periodoInicial', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Período Inicial',
                'attr' => array(
                    'placeholder' => 'Período Inicial',
                    'widget_col'=> '2',
                    'class' => 'datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
                )
            ))
            ->add('periodoFinal', 'date', array(
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd/MM/yyyy',
                'label' => 'Período Final',                
                'attr' => array(
                    'placeholder' => 'Período Final',
                    'widget_col'=> '2',
                    'class' => 'datepicker data ',
                    'help_text' => 'Click 2 vezes no campo para exibir o calendário'
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\OutrosCursos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_outroscursos';
    }
}
