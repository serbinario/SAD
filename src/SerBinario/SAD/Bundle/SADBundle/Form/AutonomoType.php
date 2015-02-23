<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SerBinario\SAD\Bundle\SADBundle\Entity\TelefonesautonomoType;
use SerBinario\SAD\Bundle\SADBundle\Form\IdentificacaoatividadeautonomoType;

class AutonomoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomeautonomo', 'text', array(
                'label' => 'Nome',           
                'attr' => array(
                    'placeholder' => 'Nome do Candidato',
                    'widget_col'=> '8',
                ))) 
            ->add('enderecoautonomo', 'text', array(
                'label' => 'Endereço',           
                'attr' => array(
                    'placeholder' => 'Endereço do Candidato',
                    'widget_col'=> '8',
                ))) 
            ->add('telefones', 'bootstrap_collection', array(   
                'type'               => new TelefonesautonomoType() ,
                'allow_add'          => true,
                'allow_delete'       => true,
                'add_button_text'    => 'Adicionar',
                'delete_button_text' => 'Remover',
                'sub_widget_col'     => 3,
                'button_col'         => 3           
                ))   
            ->add('idadeautonomo', 'text', array(
                'label' => 'Idade',           
                'attr' => array(
                    'placeholder' => 'Idade do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('escolaridade', 'entity', array(
                'label'        => 'Escolaridade',   
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Escolaridadeautonomo',
                'multiple' => false,
                'expanded' => true,
                'attr' => array(
                    'widget_col'=> '3',
                    'inline' => true
                    )
                ))
            ->add('expeprofissionalautonomo', 'text', array(
                'label' => 'Expreriência Profissional',           
                'attr' => array(
                    'placeholder' => 'Experiência Profissional',
                    'widget_col'=> '6',
                ))) 
            ->add('tempoexpeprofissionalautonomo', 'text', array(
                'label' => 'Tempo Experiência',           
                'attr' => array(
                    'placeholder' => 'Tempo de Experiência',
                    'widget_col'=> '4',
                ))) 
            ->add('outrarendaautonomo', 'money', array(
                'label' => 'Outra Renda',           
                'attr' => array(
                    'placeholder' => 'Outra Renda',
                    'widget_col'=> '4',
                ))) 
            ->add('rendaFamiliar', 'entity', array(
                'label'        => 'Renda Familiar',   
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Rendafamiliaraoutonomo',
                'multiple' => false,
                'expanded' => true,
                'attr' => array(
                    'widget_col'=> '3',
                    'inline' => true
                    )
                )) 
            ->add('interessecursoprofautonomo', 'text', array(
                'label' => 'Interesse curso profissionalizante, qual ?',           
                'attr' => array(
                    'placeholder' => 'Interesse curso profissionalizante, qual ?',
                    'widget_col'=> '6',
                ))) 
            ->add('identificacaoAtividade', new IdentificacaoatividadeautonomoType())
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Autonomo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_autonomo';
    }
}
