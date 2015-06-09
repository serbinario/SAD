<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VagasDisponiveisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('empresas','entity', array(
                'empty_value' => "Selecione a empresa",
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Empresa',
                'label'        => 'Empresas',  
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('areaDesejada','entity', array(
                'empty_value' => "Selecione a área desejada",
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\AreaDesejada',
                'label'        => 'Área Profissional',  
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('vagas','entity', array(
                'empty_value' => "Selecione a vaga",
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Vagas',
                'label'        => 'Vagas',  
                'attr' => array(
                     'widget_col'=> '3',
                    )
                )) 
            ->add('qtdVagas', 'number', array(
                'label' => 'Quantidade',           
                'attr' => array(
                    'placeholder' => 'Quantidade de vagas',
                    'widget_col'=> '5',
                )))           
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\VagasDisponiveis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_vagasdisponiveis';
    }
}
