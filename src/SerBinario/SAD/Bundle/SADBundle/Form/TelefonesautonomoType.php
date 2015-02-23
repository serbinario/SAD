<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TelefonesautonomoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('telefoneautonomo', 'text', array( 
                'label' => false,
                'attr' => array(
                    'widget_col'=> '10',
                )))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Telefonesautonomo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_telefonesautonomo';
    }
}
