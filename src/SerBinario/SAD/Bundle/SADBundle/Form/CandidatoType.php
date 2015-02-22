<?php
namespace SerBinario\SAD\Bundle\SADBundle\Form;;

use SerBinario\SAD\Bundle\SADBundle\Form\CnhType;
use SerBinario\SAD\Bundle\SADBundle\Form\CurriculoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CandidatoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                
            ->add('nomecandidato', 'text', array(
                'label' => 'Nome',           
                'attr' => array(
                    'placeholder' => 'Nome do candidato',
                    'widget_col'=> '8',
                ))) 
            ->add('cpfcandidato', 'text', array(
                'label' => 'CPF',             
                'attr' => array(
                    'placeholder' => 'CPF do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('rgcandidato', 'text', array(
                'label' => 'RG',             
                'attr' => array(
                    'placeholder' => 'RG do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('enderecocadidato', 'text', array(
                'label' => 'Logradouro',          
                'attr' => array(
                    'placeholder' => 'Logragouro do candidato',
                     'widget_col'=> '8',
                ))) 
            ->add('bairrocandidato', 'text', array(
                'label' => 'Bairro',                
                'attr' => array(
                    'placeholder' => 'Bairro do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('cepcandidato', 'text', array(
                'label' => 'CEP',             
                'attr' => array(
                    'placeholder' => 'CEP do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('cidadecandidato', 'text', array(
                'label' => 'Cidade',                  
                'attr' => array(
                    'placeholder' => 'Cidade do candidato',
                    'widget_col'=> '4',
                ))) 
            ->add('ufcandidato', 'text', array(
                'label' => 'UF',         
                'attr' => array(
                    'placeholder' => 'UF',
                    'widget_col'=> '1',
                ))) 
            ->add('emailcandidato', 'email', array(
                'label' => 'Email',         
                'attr' => array(
                    'placeholder' => 'Email do candidato',
                     'widget_col'=> '8',
                ))) 
            ->add('nascimentocandidato', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Nasciemento',        
                'attr' => array(
                    'placeholder' => 'Nascimento do candidato',
                    'widget_col'=> '4',
                )
            ))
            ->add('cnhcandidato', 'checkbox', array( 
                'label' => 'CNH',                
                'attr'    => array(
                    'inline' => true,
                    'align_with_widget'=> true 
                    )
                ))
            ->add('objCnh',  new CnhType())
            ->add('outrasinformacoescandidato', 'textarea', array(
                'label' => "Outras Informações",                        
                'attr' => array(                    
                    'rows' => '3',
                    'widget_col'=> '4',
                    'placeholder' => 'Outras informações do candidato',
                    )
                ))
            ->add('sexosexo', 'entity', array(
                'label'        => 'Sexo',   
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Sexo',
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('estadocivilestadocivil','entity', array(
                'class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Estadocivil',
                'label'        => 'Estado Civil',  
                'attr' => array(
                     'widget_col'=> '3',
                    )
                ))
            ->add('telefones', 'bootstrap_collection', array(   
                'type'               => new TelefonescandidatoType() ,
                'allow_add'          => true,
                'allow_delete'       => true,
                'add_button_text'    => 'Adicionar',
                'delete_button_text' => 'Remover',
                'sub_widget_col'     => 3,
                'button_col'         => 3           
                ))           
            ->add('curriculo', new CurriculoType())
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
            'data_class' => 'SerBinario\SAD\Bundle\SADBundle\Entity\Candidato'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'serbinario_sad_bundle_sadbundle_candidato';
    }
}
