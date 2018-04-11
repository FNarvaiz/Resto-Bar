<?php

namespace FrontEndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class VentaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder//->add('abierta')
                //->add('puntos')
                //->add('cerrada')
                //->add('descuento')
                ->add('mesa',EntityType::class,array("label"=>"Nro de mesa","class"=>"FrontEndBundle:Mesa",
    /*'query_builder' => function ("repositorio entidad" $e ) {
        return $e->createQueryBuilder('m')
    ->where('m.nro not in ( select l.nro from mesas l inner join ventas v on v.nro=l.nro where v.abierta)')
                ->orderBy('m.nro', 'ASC');} ,*/"required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('personas',IntegerType::class,array("label"=>"Cant de personas","required"=>"required"
                    ,"attr"=>array("class"=>"cTextbox")))
                ->add('Abrir',SubmitType::class,array("attr"=>array
                    ("class"=>"btn001 azul button sombra-g",)));
                //->add('idusuario')
                //->add('idcajadiaria')
                //->add('codigo');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontEndBundle\Entity\Venta'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_venta';
    }


}
