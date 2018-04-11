<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\Clima;
use FrontEndBundle\Form\ClimaType;

class ClimaController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:Clima");
       $objetos=$obj_repo->findAll();
       return $this->render("FrontEndBundle:Clima:index.html.twig",array("climas"=>$objetos));
    }
    public function EliminarAction($id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Clima");
        $objeto= $obj_repo->find($id);
        $em->remove($objeto);
        $em->flush();
        return $this->redirectToRoute("climas");
    }
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Clima");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(ClimaType::class,$objeto);
        $form->handleRequest($request);
        
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $objeto->setNombre($form->get("nombre")->getData());
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
           return $this->redirectToRoute("climas");
        }
        return $this->render('FrontEndBundle:Clima:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    public function AgregarAction(Request $request){
        $objeto= new Clima();
        $form = $this->createForm(ClimaType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                
                $objeto= new Clima();
                $objeto->setNombre($form->get("nombre")->getData());
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
           return $this->redirectToRoute("climas");
        }
        return $this->render('FrontEndBundle:Clima:agregar.html.twig', array("form"=>$form->createView()));
        
    }
    
}