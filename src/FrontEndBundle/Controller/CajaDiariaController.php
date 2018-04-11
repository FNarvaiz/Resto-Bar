<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\CajaDiaria;
use FrontEndBundle\Form\CajaDiariaType;

class CajaDiariaController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    
    public function VerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:CajaDiaria");
        $caja=  $obj_repo->find($id);
        $venta_repo = $em->getRepository("FrontEndBundle:Venta");
        $ventas= $venta_repo->findBy(array("cajadiaria" =>$caja));
        /*$em = $this->getDoctrine()->getManager();
        $query = "SELECT a.nombre, SEC_TO_TIME(SUM( IF (e.pedido>e.listo, TIMEDIFF( addtime( e.listo,'24:00:00'), e.pedido),TIMEDIFF(  e.listo, e.pedido)))/count(a.nombre)) as resta FROM `estados` e inner join articulos a on a.codigo=e.codigo inner join ventas v on v.nro=e.nro inner join cajas_diarias c on c.id=v.idCajaDiaria where c.id=5 and e.listo is not null group by a.nombre";
        $stmt = $em->getConnection()->prepare($query);
        $params = array();
        $stmt->execute($params);
        $estadisticas=$stmt->fetchAll();
        "estadisticas"=>$estadisticas,*/
        return $this->render("FrontEndBundle:CajaDiaria:ver.html.twig", array("ventas" => $ventas,"caja" => $caja));
    }
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:CajaDiaria");
       $objetos=$obj_repo->findBy(array(), array('id' => 'DESC'));
       return $this->render("FrontEndBundle:CajaDiaria:index.html.twig",array("cajasdiarias"=>$objetos));
    }
    public function EliminarAction($id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:CajaDiaria");
        $objeto= $obj_repo->find($id);
        if(count($objeto->nroVenta)==0){
            $em->remove($objeto);
        }
        else{
            $objeto->setAlta(0);
           $em->persist($objeto); 
        }
        $em->flush();
        return $this->redirectToRoute("cajasdiarias");
    }
    public function ModificarAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $obj_repo= $em->getRepository("FrontEndBundle:CajaDiaria");
        $objeto= $obj_repo->find($id);
        $form = $this->createForm(CajaDiariaType::class,$objeto);
        $form->handleRequest($request);
        
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $objeto->setFecha($form->get("fecha")->getData());
                $objeto->setMonto($form->get("monto")->getData());
                $objeto->setEvento($form->get("evento")->getData());
                $objeto->setIdclima($form->get("idclima")->getData());
                
                
                
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
           return $this->redirectToRoute("cajasdiarias");
        }
        return $this->render('FrontEndBundle:CajaDiaria:modificar.html.twig', array("form"=>$form->createView()));
        
    }
    public function CerrarAnterior(){
        $em= $this->getDoctrine()->getManager();
        $db= $em->getConnection();
        //Suma los puntos.
        $query = "update socios set puntos=puntos+1 where nro IN ( SELECT I.nroSocio FROM `items_socios` I INNER join ventas v on v.nro = I.nroVenta where v.idCajaDiaria=(SELECT id FROM `cajas_diarias` ORDER by id desc limit 1) GROUP by (nroSocio) )";
        
        $stmt = $db->prepare($query);
        
        $stmt->execute();
    }
    public function AgregarAction(Request $request){
        
        $objeto= new CajaDiaria();
        $objeto->setFecha(new \DateTime("now"));
        $form = $this->createForm(CajaDiariaType::class,$objeto);
        $form->handleRequest($request);
        $status=null;
        if($form->isSubmitted()){
            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $obj_repo= $em->getRepository("FrontEndBundle:CajaDiaria");
                $query = $obj_repo->createQueryBuilder('c')
                    ->where('c.fecha = :fecha')
                    ->setParameter('fecha',$form->get("fecha")->getData())
                    //->orderBy('p.price', 'ASC')
                    ->getQuery();
                
                $objeto=  $query->getResult(); 
                if($objeto==null){
                    $this->CerrarAnterior();
                    $objeto= new CajaDiaria();
                    $objeto->setFecha($form->get("fecha")->getData());
                    $objeto->setMonto($form->get("monto")->getData());
                    $objeto->setEvento($form->get("evento")->getData());
                    $objeto->setIdclima($form->get("idclima")->getData());

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
                    $status= "Ya hay una caja para ese dia";
                }
                
            }
            else{
                $status= "Arregle los errores marcados";
            }
            $this->session->getFlashBag()->add("status",$status);
           return $this->redirectToRoute("cajasdiarias");
        }
        return $this->render('FrontEndBundle:CajaDiaria:agregar.html.twig', array("form"=>$form->createView()));
        
    }
    
}