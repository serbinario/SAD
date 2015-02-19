<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SerBinario\SAD\Bundle\SADBundle\Form\OpcoesareadesejadaType;
use \Doctrine\ORM\EntityManager;

class InformacoesbuscaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipohorariotipohorario','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tipohorario',
                'label' => 'Tipo Horário',  
                'multiple' => false,
                'expanded' => true,
                'choices' => function (EntityManager $em) {
                    return $em->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico")->findAll();
                },
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('tiponivelherarquicotiponivelherarquico','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico',
                'label' => 'Nível Hierárquico',  
                'multiple' => false,
                'expanded' => true,
                'choices' => function (EntityManager $em) {
                    return $em->getRepository("SerBinario\SAD\Bundle\SADBundle\Entity\Tiponivelherarquico")->findAll();
                },
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('opcoesdesejadas','bootstrap_collection', array(
                        'label'              => "Opções desejadas",
                        'allow_add'          => true,
                        'allow_delete'       => true,
                        'add_button_text'    => 'Adicionar',
                        'delete_button_text' => 'Remover',
                        'sub_widget_col'     => 10,
                        'button_col'         => 3,                        
                        'type'  => new OpcoesareadesejadaType()                        
                    )
                )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Informacoesbusca'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_informacoesbusca';
    }
}
