<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
class ArticuloType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array("required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('precio',TextType::class,array("required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('cocina',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('bar',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('puntos',IntegerType::class,array("required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox","value"=>"0")))
                ->add('socio',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('happy',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('alta',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                //->add('codigoarticulo',CollectionType::class,array("label"=>"Combo","required"=>"required"))
                 
                ->add('Guardar',SubmitType::class,array("attr"=>array("class"=>"btn001 azul button sombra-g",)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Articulo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_articulo';
    }


}
