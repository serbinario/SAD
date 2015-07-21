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
             ->add('tipolinguaextrangeiralinguaextrangeira','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipolinguaextrangeira',
                 'empty_value' => "Selecione o idioma",
                 'required' => false,
                'label' => false,                
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('tipoQualifLingExtrangeira','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\TipoQualifLingExtrangeira',                  
                'label' => false,
                'multiple' => false,
                'required' => false,
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
