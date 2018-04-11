<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\Socio;
use FrontEndBundle\Form\SocioType;

class SocioController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:Socio");
       $objetos=$obj_repo->findAll();
       return $this->render("FrontEndBundle:Socio:index.html.twig",array("socios"=>$objetos));
    }
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:Socio");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(SocioType::class,$objeto);
        $form->handleRequest($request);
        
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $nro=(int)$form->get("nro")->getData();
                if($objeto->getNro()!=$nro){//$form->get("nro")->getData()){
                    $objeto = $obj_repo->findOneBy(array('nro'=>$nro));
                
                    if(count($objeto)!=0){
                    $this->session->getFlashBag()->add("status","Ya existe el nuevo nro de socio en otro");
                    return $this->redirectToRoute("socios");
                    }
                    else{
                        $objeto=new Socio();
                    }
                }
                $objeto->setNombre($form->get("nombre")->getData());
                $objeto->setNro($form->get("nro")->getData());
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
           return $this->redirectToRoute("socios");
        }
        return $this->render('FrontEndBundle:Socio:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    public function AgregarAction(Request $request){
        $objeto= new Socio();
        $form = $this->createForm(SocioType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $obj_repo= $em->getRepository("FrontEndBundle:Socio");
                
                $query = $obj_repo->createQueryBuilder('s')
                    ->where('s.nro = :nro')
                    ->setParameter('nro',$form->get("nro")->getData())
                    
                    ->getQuery();
                
                $objeto=  $query->getResult(); 
                if($objeto==null){
                    $objeto= new Socio();
                    $objeto->setNombre($form->get("nombre")->getData());
                    $objeto->setNro($form->get("nro")->getData());
                    $objeto->setPuntos($form->get("puntos")->getData());

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
                    $status= "Ya existe ese nro de socio";
                }
            }
            else{
                $status= "Arregle los errores marcados";
            }
            $this->session->getFlashBag()->add("status",$status);
           return $this->redirectToRoute("socios");
        }
        return $this->render('FrontEndBundle:Socio:agregar.html.twig', array("form"=>$form->createView()));
        
    }
    
}