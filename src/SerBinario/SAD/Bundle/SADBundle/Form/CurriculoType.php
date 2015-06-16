<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SerBinario\SAD\Bundle\SADBundle\Form\FormacaoType;
use SerBinario\SAD\Bundle\SADBundle\Form\ExperienciaprofissionalType;
use SerBinario\SAD\Bundle\SADBundle\Form\InformaticaType;
use SerBinario\SAD\Bundle\SADBundle\Form\QualificacaofuturaType;
use SerBinario\SAD\Bundle\SADBundle\Form\InformacoesbuscaType;

class CurriculoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resumocurriculo', 'textarea', array(
                'label' => "Resumo Currículo",                        
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Resumo do curículo',
                    )
                ))
            ->add('prentencaosalarialcurriculo', 'text', array(
                'label' => "Pretenção Salarial",                        
                'attr' => array(                  
                    'widget_col'=> '4',
                    'placeholder' => 'Pretenção Salarial',
                    )
                ))
            ->add('atualmenteempregadocurriculo', 'checkbox', array( 
                'label' => 'Atualmente Trabalhando ?',                
                'attr'    => array(
                    'inline' => true,
                    'align_with_widget'=> true 
                    )
                ))
            ->add('formacoes', 'bootstrap_collection', array(
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                        
                        'type'  => new FormacaoType()                        
                    )
                )
            ->add('experienciasProfissionais', 'bootstrap_collection', array(
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                        
                        'type'  => new ExperienciaprofissionalType()                        
                    )
                )
            ->add('informatica', 'bootstrap_collection', array(
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                                   
                        'type'  => new InformaticaType()                        
                    )
                )  
            ->add('linguasExtrangeiras', 'bootstrap_collection', array(
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                        
                        'type'  => new LinguaextrangeiraType()                        
                    )
                )  
            ->add('qualificacoesFuturas','bootstrap_collection', array(
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                        
                        'type'  => new QualificacaofuturaType()                        
                    )
                )
            ->add('informacaoBusca', new InformacoesbuscaType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Curriculo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_curriculo';
    }
}
