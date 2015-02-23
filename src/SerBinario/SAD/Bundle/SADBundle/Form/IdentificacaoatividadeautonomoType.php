<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SerBinario\SAD\Bundle\SADBundle\Form\ReferenciaprofissionalautonomoType;

class IdentificacaoatividadeautonomoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoatividadeautonomotipoatividadeautonomo', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeautonomo',
                'label' => 'Tipo atividade', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '8',
                    'inline' => true
                    )
                ))
            ->add('areaabrangenciaautonomoareaabrangenciaautonomo', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Areaabrangenciaautonomo',
                'label' => 'Área Abrangência', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '8',
                    'inline' => true
                    )
                ))
            ->add('tempoatividadeautonomo', 'text', array(
                'label' => 'Tempo Atividade',           
                'attr' => array(
                    'placeholder' => 'Tempo Atividade',
                    'widget_col'=> '6',
                ))) 
            ->add('qtdPessoasEnvolvidasAutonomo', 'choice', array(
                'label' => 'Qtd. Pessoas Envolvidas',           
                'multiple' => false,
                'expanded' => true,
                'choices' => array(1, 2, 3, 4 => 'Acima de 3'),
                'attr' => array('inline' => true)
                ))
            ->add('observacoesidentificacaoatividadeautonomo', 'textarea', array(
                'label' => "Observação",                        
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Observação',
                    )
                )) 
            ->add('referenciasProfissionais', 'bootstrap_collection', array(   
                'type'               => new ReferenciaprofissionalautonomoType() ,
                'allow_add'          => true,
                'allow_delete'       => true,
                'add_button_text'    => 'Adicionar',
                'delete_button_text' => 'Remover',
                'sub_widget_col'     => 10,
                'button_col'         => 3           
                )) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeautonomo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_identificacaoatividadeautonomo';
    }
}
