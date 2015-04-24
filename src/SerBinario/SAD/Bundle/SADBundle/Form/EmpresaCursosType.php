<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpresaCursosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresa', 'entity', array(
                'label'        => 'Empresa',   
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Empresa',
                'attr' => array(
                     'widget_col'=> '3',
                    )
            ))
            ->add('cursos', 'entity', array(
                'label'        => 'Empresa',   
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Cursos',
                'attr' => array(
                     'widget_col'=> '3',
                    )
            ))
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\EmpresaCursos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_empresacursos';
    }
}
