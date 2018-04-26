<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nombre',TextType::class,array("required"=>"required",
                    "attr"=>array("class"=>"cTextbox")))
                ->add('password',PasswordType::class,array("label"=>"Contraseña","required"=>"required",
                    "attr"=>array("class"=>"cTextbox")))
                ->add('permiso',ChoiceType::class,array("required"=>"required",
                    "choices"=>array("Administrador"=>"ROLE_ADMIN","Mozo"=>"ROLE_MOZO","Cocinero"=>"ROLE_COCINERO")//,"Barman"=>"bar")
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('alta',CheckboxType::class,array("required"=>false
                    ,"attr"=>array("class"=>"cCheckbox")))
                ->add('Guardar',SubmitType::class,array("attr"=>array
                    ("class"=>"btn001 azul button sombra-g",)));//, entity::class , array('class' => 'FrontEndBundle\Entity\Permiso'));
                //->add('idpermiso');
     /*   ->add('idpermiso', 'collection', array(
                                            'class'       => 'FrontEndBundle\Entity\Permiso',
                                            'property'    => 'Nombre',
                                            'empty_value' => 'Permiso',
                                            'required'    => true,
                                            'multiple'    => false,
                                            'label'       => 'Crea in:'));*/
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_usuario';
    }


}
