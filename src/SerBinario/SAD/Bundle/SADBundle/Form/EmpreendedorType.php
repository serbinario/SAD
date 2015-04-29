<?php

namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SerBinario\SAD\Bundle\SADBundle\Form\IdentificacaoatividadeempreendedorType;
use SerBinario\SAD\Bundle\SADBundle\Form\IdentificacaonecessidadeType;
use SerBinario\SAD\Bundle\SADBundle\Form\TelefonesempreendedorType;

class EmpreendedorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeempreendedor', 'text', array(
                'label' => 'Nome',           
                'attr' => array(
                    'placeholder' => 'Nome do Empreendedor',
                    'widget_col'=> '8',
                ))) 
            ->add('enderecoresidencial', 'text', array(
                'label' => 'Endereço',           
                'attr' => array(
                    'placeholder' => 'Endereço',
                    'widget_col'=> '8',
                ))) 
            ->add('idadeempreendedor', 'text', array(
                'label' => 'Idade',           
                'attr' => array(
                    'placeholder' => 'Idade do Empreendedor',
                    'widget_col'=> '4',
                ))) 
            ->add('expeprofissionalempreendedor', 'text', array(
                'label' => 'Experiência Profissional',           
                'attr' => array(
                    'placeholder' => 'Experiência Profissional',
                    'widget_col'=> '6',
                )))
            ->add('tempoexpeprofissionalempreendedor', 'text', array(
                'label' => 'Quanto Tempo',           
                'attr' => array(
                    'placeholder' => 'Quanto Tempo',
                    'widget_col'=> '4',
                ))) 
            ->add('outrarendaempreendedor', 'money', array(
                'label' => 'Outra Renda',           
                'attr' => array(
                    'placeholder' => 'Outra Renda',
                    'widget_col'=> '4',
                ))) 
            ->add('interessecursoprofempreendedor', 'text', array(
                'label' => 'Interesse em cursos profissionalizantes, qual',           
                'attr' => array(
                    'placeholder' => 'Interesse em cursos profissionalizantes, qual',
                    'widget_col'=> '6',
                )))
            ->add('telefones', 'bootstrap_collection', array(  
                        'type'               => new TelefonesempreendedorType(),                        
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 3,
                        'button_col'         => 3
                    )
                )
            ->add('escolaridade', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Escolaridadeempreendedor',
                'empty_value' => "Selecione a escolaridade",
                'label'        => 'Escolaridade',  
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('rendafamiliar', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Rendafamiliarempreendedor',
                'label' => 'Renda Familiar', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '3',
                    'inline' => true
                    )
                ))
            ->add('identificacaoAtividade', new IdentificacaoatividadeempreendedorType())
            ->add('indentificacaoNecessidade', new IdentificacaonecessidadeType())
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Empreendedor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_empreendedor';
    }
}
