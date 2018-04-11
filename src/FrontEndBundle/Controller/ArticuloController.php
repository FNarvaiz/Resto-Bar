<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\Articulo;
use FrontEndBundle\Form\ArticuloType;

class ArticuloController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:Articulo");
       $objetos=$obj_repo->findAll();
       return $this->render("FrontEndBundle:Articulo:index.html.twig",array("articulos"=>$objetos));
    }
    public function EliminarAction($id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Articulo");
        $objeto= $obj_repo->find($id);
        $items_repo= $em->getRepository("FrontEndBundle:Item");
        $items_socios_repo= $em->getRepository("FrontEndBundle:ItemSocio");
        $items= $items_repo->findBy(array("articulo"=>$objeto));
        $itemsSocio= $items_socios_repo->findBy(array("articulo"=>$objeto));
        $status=null;
        if(count($items)>0 || count($itemsSocio)>0){
            $objeto->setAlta(0);
           $em->persist($objeto); 
           $status ="baja";
        }
        else{
            $em->remove($objeto);
            $status="ok";
        }
       if($em->flush()!=null)
           $status= "Error";
       echo $status;
       die();
    }
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Articulo");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(ArticuloType::class,$objeto);
        $form->handleRequest($request);
        
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $objeto->setNombre($form->get("nombre")->getData());
                $objeto->setBar($form->get("bar")->getData());
                $objeto->setCocina($form->get("cocina")->getData());
                $objeto->setAlta($form->get("alta")->getData());
                $objeto->setSocio($form->get("socio")->getData());
                $objeto->setHappy($form->get("happy")->getData());
                $objeto->setPuntos($form->get("puntos")->getData());
                
                
                $em->persist($objeto);
                $flush= $em->flush();
                if($flush==null){
                    $status="Se modifico correctamente";
                }
                else{
                    $status= "Error al guardar la información";
                }
            }
            else{
                $status= "Arregle los errores marcados";
            }
            $this->session->getFlashBag()->add("status",$status);
           return $this->redirectToRoute("articulos");
        }
        return $this->render('FrontEndBundle:Articulo:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    public function AgregarAction(Request $request){
        $objeto= new Articulo();
        $form = $this->createForm(ArticuloType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                
                $objeto= new Articulo();
                $objeto->setNombre($form->get("nombre")->getData());
                $objeto->setPrecio($form->get("precio")->getData());
                $objeto->setBar($form->get("bar")->getData());
                $objeto->setSocio($form->get("socio")->getData());
                $objeto->setHappy($form->get("happy")->getData());
                $objeto->setPuntos($form->get("puntos")->getData());
                $objeto->setCocina($form->get("cocina")->getData());
                $objeto->setAlta($form->get("alta")->getData());
                
                $em->persist($objeto);
                $flush= $em->flush();
                if($flush==null){
                    $status="Se agrego correctamente";
                }
                else{
                    $status= "Error al guardar la información";
                }
            }
            else{
                $status= "Arregle los errores marcados";
            }
            $this->session->getFlashBag()->add("status",$status);
           return $this->redirectToRoute("articulos");
        }
        return $this->render('FrontEndBundle:Articulo:agregar.html.twig', array("form"=>$form->createView()));
        
    }
    
}