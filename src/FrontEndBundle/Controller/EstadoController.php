<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EstadoController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Estado");
        $objetos = $obj_repo->findAll();
        return $this->render("FrontEndBundle:Estado:index.html.twig", array("estados" => $objetos));
    }

    public function EntregadoAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Estado");
        $objeto = $obj_repo->find($id);
        ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
        $objeto->setServido(new \DateTime('now'));
        $em->persist($objeto);
        if ($em->flush() == null) {
            echo "ok";
        } else {
            echo "Error al guardar la información";
        }
        die();
    }

    public function ListoAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Estado");
        $objeto = $obj_repo->find($id);
        ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
        $objeto->setListo(new \DateTime('now'));
        $em->persist($objeto);
        if ($em->flush() == null) {
            return $this->render("FrontEndBundle:Estado:boton.html.twig", array("estado" => $objeto));
        } else {
            echo "Error al guardar la información";
        }
        die();
    }
    public function NotificacionesAction() {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get("security.token_storage")->getToken()->getUser();
        if( $usuario->getPermiso()=="ROLE_MOZO" ){
            $query = "SELECT a.nombre,count(a.nombre) as cant FROM ESTADOS e INNER JOIN ARTICULOS a ON a.codigo=e.codigo INNER JOIN ventas v on v.nro= e.nro where v.cerrada is null and e.servido is null and v.idusuario= ".$usuario->getId()."  and ADDTIME(e.listo, '10:00:10')>TIME(NOW()) GROUP BY a.nombre";
            
        }
        else if($usuario->getPermiso()=="ROLE_COCINERO"){
            $query = "SELECT a.nombre,count(a.nombre) as cant FROM ESTADOS e INNER JOIN ARTICULOS a ON a.codigo=e.codigo INNER JOIN ventas v on v.nro= e.nro where v.cerrada is null and  a.cocina=1 and e.listo is null and  ADDTIME(e.pedido, '00:00:10')>TIME(NOW()) GROUP BY a.nombre ";
            
        }
        else if($usuario->getPermiso()=="ROLE_ADMIN"){
            $query ="SELECT a.nombre,count(a.nombre) as cant FROM ESTADOS e INNER JOIN ARTICULOS a ON a.codigo=e.codigo INNER JOIN ventas v on v.nro= e.nro where v.cerrada is null and e.listo is null and a.bar=1 and ADDTIME(e.pedido, '00:00:10')>TIME(NOW()) GROUP BY a.nombre ";
            
        }
        $stmt = $em->getConnection()->prepare($query);
        
        $params = array();
        $stmt->execute($params);
        $estados=$stmt->fetchAll();
        $texto="";
        if(count( $estados)>0){
            foreach ($estados as $estado) {
                $texto=$texto .$estado["nombre"]." - " .$estado["cant"]."</br>";
            }
        }
        echo $texto;
        die();
    }
}
