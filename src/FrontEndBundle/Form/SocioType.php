<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class SocioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nro',IntegerType::class,array("required"=>"required",
                    "attr"=>array("class"=>"cTextbox")))
                ->add('nombre',TextType::class,array("required"=>"required",
                    "attr"=>array("class"=>"cTextbox")))
                ->add('puntos',IntegerType::class,array("required"=>"required",
                    "attr"=>array("class"=>"cTextbox")))
                ->add('Guardar',SubmitType::class,array("attr"=>array
                    ("class"=>"btn001 azul button sombra-g",)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Socio'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_socio';
    }


}
