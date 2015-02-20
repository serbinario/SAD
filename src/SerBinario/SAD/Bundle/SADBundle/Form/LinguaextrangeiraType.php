<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinguaextrangeiraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nocaolinguaextrangeira', 'choice', array( 
                'label' => 'Noção',
                'multiple' => true,
                'expanded' => true,         
                'choices' => array(1 => "Ativar") ,
                'attr'    => array('inline' => true)
                ))
            ->add('fluencialinguaextrangeira', 'choice', array( 
                'label' => 'Fluência',
                'multiple' => true,
                'expanded' => true,         
                'choices' => array(1 => "Ativar") ,
                'attr'    => array('inline' => true)
                ))
            ->add('redacaolinguaextrangeira', 'choice', array( 
                'label' => 'Redação',
                'multiple' => true,
                'expanded' => true,         
                'choices' => array(1 => "Ativar") ,
                'attr'    => array('inline' => true)
                ))
            ->add('traducaolinguaextrangeira', 'choice', array( 
                'label' => 'Tradução',
                'multiple' => true,
                'expanded' => true,         
                'choices' => array(1 => "Ativar") ,
                'attr'    => array('inline' => true)
                ))           
            ->add('tipolinguaextrangeiralinguaextrangeira','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira',                  
                'label' => 'Cursos Linguas',                
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Linguaextrangeira'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_linguaextrangeira';
    }
}
