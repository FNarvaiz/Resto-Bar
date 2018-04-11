<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
class ConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('inicio',TimeType::class,array("label"=>"Inicio","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('fin',TimeType::class,array("label"=>"Fin","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('socio',TextType::class,array("required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('happy',TextType::class,array("required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('Guardar',SubmitType::class,array("attr"=>array("class"=>"btn001 azul button sombra-g",)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Config'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_config';
    }


}
