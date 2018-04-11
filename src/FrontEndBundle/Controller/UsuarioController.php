<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FrontEndBundle\Entity\Usuario;
use FrontEndBundle\Form\UsuarioType;
use Symfony\Component\HttpFoundation\Session\Session;
class UsuarioController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    public function loginAction(Request $request)
    {
        $herramientaAuticacion = $this->get("security.authentication_utils");
        $error = $herramientaAuticacion->getLastAuthenticationError();
        $lastUsername = $herramientaAuticacion->getLastUsername();
        if($this->get("security.token_storage")->getToken()->getUser()!="anon."){
            
            return $this->redirectToRoute('ventas');
            
        }
        else{
        return $this->render('FrontEndBundle:Usuario:login.html.twig', array("error" =>$error,"last_usuario"=> $lastUsername));
        }
        
    }
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:Usuario");
       $objetos=$obj_repo->findAll();
       return $this->render("FrontEndBundle:Usuario:index.html.twig",array("usuarios"=>$objetos));
    }
    public function EliminarAction($id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Usuario");
        $objeto= $obj_repo->find($id);
        $em->remove($objeto);
        $em->flush();
        return $this->redirectToRoute("usuarios");
    }
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Usuario");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(UsuarioType::class,$objeto);
        $form->handleRequest($request);
        
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $factory = $this->get("security.encoder_factory");
                $encoder= $factory->getEncoder($objeto);
                $password= $encoder->encodePassword($form->get("password")->getData(),$objeto->getSalt());
                $objeto->setNombre($form->get("nombre")->getData());
                $objeto->setPassword($password);
                $objeto->setPermiso($form->get("permiso")->getData());
                $objeto->setAlta($form->get("alta")->getData());
                
                
                
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
           return $this->redirectToRoute("usuarios");
        }
        return $this->render('FrontEndBundle:Usuario:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    public function AgregarAction(Request $request){
        $objeto= new Usuario();
        $form = $this->createForm(UsuarioType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                
                $objeto= new Usuario();
                $factory = $this->get("security.encoder_factory");
                $encoder= $factory->getEncoder($objeto);
                $password= $encoder->encodePassword($form->get("password")->getData(),$objeto->getSalt());
                $objeto->setNombre($form->get("nombre")->getData());
                $objeto->setPassword($password);
                $objeto->setPermiso($form->get("permiso")->getData());
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
           return $this->redirectToRoute("usuarios");
        }
        return $this->render('FrontEndBundle:Usuario:agregar.html.twig', array("form"=>$form->createView()));
        
    }
}