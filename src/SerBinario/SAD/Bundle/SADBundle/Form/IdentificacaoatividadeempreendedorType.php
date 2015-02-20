<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IdentificacaoatividadeempreendedorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoatividadeempreendedortipoatividadeempreendedor', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipoatividadeempreendedor',
                'label' => 'Tipo atividade', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '8',
                    'inline' => true
                    )
                ))
            ->add('ramonegocioempreendedorramonegocioempreendedor', 'entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Ramonegocioempreendedor',
                'label' => 'Ramo negócio', 
                'multiple' => false,
                'expanded' => true,          
                'attr' => array(
                    'widget_col'=> '8',
                    'inline' => true
                    )
                ))
            ->add('equipamentoultilizadoempreendedor', 'text', array(
                'label' => 'Equipamento Ultilizado',           
                'attr' => array(
                    'placeholder' => 'Equipamento Ultilizado',
                    'widget_col'=> '6',
                ))) 
            ->add('tempoatividadeempreendedor', 'text', array(
                'label' => 'Tempo de atividade',           
                'attr' => array(
                    'placeholder' => 'Tempo de atividade',
                    'widget_col'=> '4',
                )))             
            ->add('qtdPessoasEnvolvidas','choice', array(
                'multiple' => false,
                'expanded' => true,
                'choices' => array(1, 2, 3, 4 => 'Acima de 3'),
                'attr' => array('inline' => true)
                ))
            ->add('observacoesempreendedor', 'textarea', array(
                'label' => "Observação",                        
                'attr' => array(                    
                    'rows' => '6',
                    'widget_col'=> '6',
                    'placeholder' => 'Observação',
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Identificacaoatividadeempreendedor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_identificacaoatividadeempreendedor';
    }
}
