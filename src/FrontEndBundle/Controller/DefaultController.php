<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $user=$this->get("security.token_storage")->getToken()->getUser();
        if($user==null)
            
                return $this->redirectToRoute("login");
        else{
            echo $user;
            /*if($user->getPermiso()=="admin"){
                
                $em= $this->getDoctrine()->getManager();
                $obj_repo= $em->getRepository("FrontEndBundle:CajaDiaria");
                $ventas_repo= $em->getRepository("FrontEndBundle:Venta");
                $query = $obj_repo->createQueryBuilder('c')
                    ->orderBy('c.fecha', 'ASC')
                    ->setMaxResults( 1 )
                    ->getQuery();
                $objeto= $query->getResult(); 
                $query = $ventas_repo->createQueryBuilder('v')
                        ->where('c.cerrada = :cerrada')
                    ->setParameter('cerrada',null)
                        ->orderBy('v.abierta', 'ASC')
                    ->getQuery();
                
                $ventasAbiertas =$query->getResult(); 
            }*/
            return $this->render('FrontEndBundle:Default:index.html.twig');
        }
    }
}
