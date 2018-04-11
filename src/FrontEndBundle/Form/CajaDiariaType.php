<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CajaDiariaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fecha',DateType::class,array("label"=>"Fecha:","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('monto',TextType::class,array("label"=>"Monto incial: $","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('idclima',EntityType::class,array("label"=>"Climas","class"=>"FrontEndBundle:Clima","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('evento',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('Listo',SubmitType::class,array("attr"=>array
                    ("class"=>"btn001 azul button sombra-g",)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\CajaDiaria'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_cajadiaria';
    }


}
