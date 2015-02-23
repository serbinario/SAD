<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use \Doctrine\ORM\EntityManager;

class InformaticaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('tiposinformaticatiposinformatica','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tiposinformatica',
                'label' => false,                
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('tipoNivelInformatica','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\TipoNivelInformatica',
                'label' => false,
                'multiple' => false,
                'expanded' => true,  
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Informatica'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_informatica';
    }
}
