<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Form\ConfigType;

class ConfigController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    
    
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Config");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(ConfigType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $objeto->setInicio($form->get("inicio")->getData());
                $objeto->setFin($form->get("fin")->getData());
                $objeto->setSocio($form->get("socio")->getData());
                $objeto->setHappy($form->get("happy")->getData());
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
           return $this->redirectToRoute("index");
        }
        return $this->render('FrontEndBundle:Config:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    
}