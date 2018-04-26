<?php

namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\Venta;
use FrontEndBundle\Entity\Estado;
use FrontEndBundle\Entity\Item;
use FrontEndBundle\Entity\ItemSocio;
use FrontEndBundle\Form\VentaType;

class VentaController extends Controller {

    private $session;

    public function __construct() {
        $this->session = new Session();
    }
    
    public function indexAction() {
        
        
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Venta");
        
        $usuario = $this->get("security.token_storage")->getToken()->getUser();
        if($usuario=="anon."){
            return $this->redirectToRoute("login");
        }
        else
        {
            if( $usuario->getPermiso()=="ROLE_ADMIN" ){
                $query = $em->createQuery("SELECT e FROM FrontEndBundle\Entity\Estado e JOIN e.venta v where v.cerrada is null order by e.pedido asc,e.id asc ");
                $estados = $query->getResult();
                $abiertas = $obj_repo->findBy(array("cerrada" =>null));
                return $this->render("FrontEndBundle:Venta:index.html.twig", array("abiertas" => $abiertas,"estados" => $estados));
            }
            else if ( $usuario->getPermiso()=="ROLE_MOZO" ) {
                $query = $em->createQuery("SELECT e FROM FrontEndBundle\Entity\Estado e JOIN e.venta v where v.cerrada is null and v.usuario= :usuario1 order by e.pedido asc,e.id asc ");
                $query->setParameters(array('usuario1' => $usuario));
                $estados = $query->getResult();
                $abiertas = $obj_repo->findBy(array("usuario" => $usuario,"cerrada" =>null));
                return $this->render("FrontEndBundle:Venta:index.html.twig", array("abiertas" => $abiertas,"estados" => $estados));
            }
            else{//cocinero
                $query = $em->createQuery("SELECT e FROM FrontEndBundle\Entity\Estado e JOIN e.articulo a JOIN e.venta v where v.cerrada is null and  e.listo IS null and a.cocina=1 order by e.id asc ");
                $estados = $query->getResult();
                
                return $this->render("FrontEndBundle:Venta:index.html.twig", array("abiertas" => "","estados" => $estados));

            }
        }
        
    }

    public function mostrarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $venta_repo = $em->getRepository("FrontEndBundle:Venta");
        $venta = $venta_repo->find($id);
        $repo_ItemSocio = $em->getRepository("FrontEndBundle:ItemSocio");
        $repo_Item = $em->getRepository("FrontEndBundle:Item");
        $items_socios = $repo_ItemSocio->findBy(array("venta" => $venta));
        $query = $em->createQuery("SELECT e FROM FrontEndBundle\Entity\Estado e where e.venta= :nroventa order by e.pedido desc,e.id asc ");
        $query->setParameters(array('nroventa' => $id));
        $estados = $query->getResult();

        $items = $repo_Item->findBy(array("venta" => $venta));
        return $this->render("FrontEndBundle:Venta:mostrar.html.twig", array("venta" => $venta, "items_socios" => $items_socios, "items" => $items,"estados"=>$estados));
    }

    public function itemsAction($nroventa) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Articulo");
        $objetos = $obj_repo->findBy(array("alta" => 1),array("nombre"=>"asc"));
        $config = $em->getRepository("FrontEndBundle:Config")->find(1);
        $descuento= $this->DescuentoHappy($config);
        
        if($descuento!=0){
            $objetos=$this->RealizarDescuento($objetos,$descuento);
        }
        return $this->render("FrontEndBundle:Venta:items.html.twig", array("articulos" => $objetos, "nroventa" => $nroventa,"config"=>$config));
    }
    public function RealizarDescuento($objetos, $descuento){
            $numero=1-($descuento/100);
            foreach($objetos as $objeto){
                if($objeto->getHappy()){
                    $objeto->setPrecio(round($objeto->getPrecio()*$numero));
                }
            }
            return $objetos;
    }
    public function DescuentoHappy($config){
        $ahora= new \DateTime("now");
        $ahora->setDate("1970", "01", "01");
        $ahora=$ahora->getTimestamp();
        $fin=$config->getFin()->getTimestamp();
        $inicio=$config->getInicio()->getTimestamp();
        
        if($ahora > $inicio && $ahora<$fin){
            return $config->getHappy();
        }
        return 0;
    }
    public function itemsPuntosSocioAction($nroventa,$nrosocio) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT A FROM FrontEndBundle\Entity\Articulo A where A.alta=1 and A.puntos>0 order by A.nombre asc ");
        $objetos = $query->getResult();
        $socio= $em->getRepository("FrontEndBundle:Socio")->find($nrosocio);
        
        return $this->render("FrontEndBundle:Venta:items.html.twig", array("articulos" => $objetos, "nroventa" => $nroventa,"socio"=>$socio,"cambio"=>true));
    }
    public function itemsSocioAction($nroventa,$nrosocio) {
        $em = $this->getDoctrine()->getManager();
        $objetos = $em->getRepository("FrontEndBundle:Articulo")->findBy(array("alta" => 1),array("nombre"=>"asc"));
        $config = $em->getRepository("FrontEndBundle:Config")->find(1);
        $socio= $em->getRepository("FrontEndBundle:Socio")->find($nrosocio);
        $descuento= $this->DescuentoHappy($config);
        
        if($descuento!=0){
            $objetos=$this->RealizarDescuento($objetos,$descuento);    
        }
        else if ($config->getSocio()!=0){
            $objetos=$this->RealizarDescuento($objetos,$config->getSocio());
        }
        
        return $this->render("FrontEndBundle:Venta:items.html.twig", array("articulos" => $objetos, "nroventa" => $nroventa,"config"=>$config,"socio"=>$socio));
    }
    public function CambiarPuntosSocioAction($codigo,$nroventa,$nrosocio){
        $em = $this->getDoctrine()->getManager();
        $articulo = $em->getRepository("FrontEndBundle:Articulo")->find($codigo);
        
        $socio = $em->getRepository("FrontEndBundle:Socio")->find($nrosocio);
        if($articulo->getPuntos()<=$socio->getPuntos()){
        $item_repo = $em->getRepository("FrontEndBundle:ItemSocio");
        $item = $item_repo->findBy(array("articulo" => $codigo,"venta"=>$nroventa,"socio"=>$nrosocio));
        $venta_repo = $em->getRepository("FrontEndBundle:Venta");
        $venta = $venta_repo->find($nroventa);
        if ($item == null) {
            $item = new ItemSocio();
            $item->setSocio($socio);
            $item->setArticulo($articulo);
            $item->setVenta($venta);
            $item->setPuntos($articulo->getPuntos());
            $item->setCantidad(1);
            $item->setMonto(0);
        } else {
            $item=$item[0];
            $item->sumarPuntos($articulo->getPuntos());
            $item->sumarUno();
        }
        $em->persist($item);
        $socio->setPuntos($socio->getPuntos()-$articulo->getPuntos());
        $em->persist($socio);
        $estado= new Estado();
        $estado->setArticulo($articulo);
        $estado->setVenta($venta);
        $estado->setPedido(new \DateTime('now'));
        $em->persist($estado);
            if( $em->flush())
            {
                echo "Se produjo un error al guardar";
            }
            else
            {echo "Se guardo correctamente";}

        }
        else
        {
            echo "No tiene suficientes puntos";
        }
        die();
    }
    public function EliminarItemSocioAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:ItemSocio");

        $objeto = $obj_repo->find($id);
        
        $venta = $objeto->getVenta();
        $venta->setTotal($venta->getTotal()-$objeto->getMonto());
        $em->remove($objeto);
        $em->persist($venta);
        $em->flush();
        return $this->redirectToRoute("ventas_mostrar", array("id" => $venta->getNro()));
    }

    public function EliminarItemAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Item");
        $objeto = $obj_repo->find($id);
        $venta = $objeto->getVenta();
        $venta->setTotal($venta->getTotal()-$objeto->getMonto());
        $em->remove($objeto);
        $em->persist($venta);
        $em->flush();
        return $this->redirectToRoute("ventas_mostrar", array("id" =>  $venta->getNro()));
    }
    public function AgregarItemsAction($codigos, $nroventa) {
        $codigos= split(",",$codigos);
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository("FrontEndBundle:Config")->find(1);
        $descuento=$this->DescuentoHappy($config);
        foreach($codigos as $codigo){
            if($codigo!=""){
                if(strpos($codigo,"<>")){
                    $partes= split("<>",$codigo);
                    $this->AgregarItemAction($partes[0],$partes[1], $nroventa,$descuento);
                }
                else
                {
                    $this->AgregarItemAction($codigo,"", $nroventa,$descuento);
                }
            }
        }
        return $this->redirectToRoute("ventas_mostrar", array("id" =>  $nroventa));
    }
    public function AgregarItemsSocioAction($codigos, $nroventa,$nrosocio) {
        $codigos= split(",",$codigos);
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository("FrontEndBundle:Config")->find(1);
        $descuento=$this->DescuentoHappy($config);
        $happy=true;
        if($descuento==0){
            $happy=false;
            $descuento= $config->getSocio();
        }
        foreach($codigos as $codigo){
            if($codigo!=""){
                if(strpos($codigo,"<>")){
                    $partes= split("<>",$codigo);
                    $this->AgregarItemSocioAction($partes[0],$partes[1], $nroventa,$nrosocio,$descuento,$happy);
                }
                else
                {
                    $this->AgregarItemSocioAction($codigo,"", $nroventa,$nrosocio,$descuento,$happy);
                }
            }
        }
        return $this->redirectToRoute("ventas_mostrar", array("id" =>  $nroventa));
    }
    public function AgregarItemAction($codigo,$nota, $nroventa,$descuento) {
        
        $em = $this->getDoctrine()->getManager();
        $item_repo = $em->getRepository("FrontEndBundle:Item");
        $item = $item_repo->findBy(array("articulo" => $codigo,"venta"=>$nroventa));
        $art_repo = $em->getRepository("FrontEndBundle:Articulo");
        $articulo = $art_repo->find($codigo);
        $venta_repo = $em->getRepository("FrontEndBundle:Venta");
        $venta = $venta_repo->find($nroventa);
        $precio=$articulo->getPrecio();
        if($descuento!=0 && $articulo->getHappy()){
            $precio=round($precio*(1-($descuento/100)));
        }
        if ($item == null) {
            $item = new Item();
            $item->setArticulo($articulo);
            $item->setVenta($venta);
            $item->setCantidad(1);
            $item->setMonto($precio);
        } else {
            $item=$item[0];
            $item->sumarUno();
            $item->sumarAlMonto( $precio);
        }
        $em->persist($item);
        $venta->setTotal( $venta->getTotal()+$precio);
        $em->persist($venta);
        
        $estado= new Estado();
        $estado->setArticulo($articulo);
        $estado->setVenta($venta);
        $estado->setNota($nota);
        $estado->setPedido(new \DateTime('now'));
        $em->persist($estado);
        
        $flush = $em->flush();
        
        
    }
    public function AgregarItemSocioAction($codigo,$nota, $nroventa,$nrosocio,$descuento,$happy) {
        $em = $this->getDoctrine()->getManager();
        $item_repo = $em->getRepository("FrontEndBundle:ItemSocio");
        $item = $item_repo->findBy(array("articulo" => $codigo,"venta"=>$nroventa,"socio"=>$nrosocio));
        $art_repo = $em->getRepository("FrontEndBundle:Articulo");
        $articulo = $art_repo->find($codigo);
        $venta_repo = $em->getRepository("FrontEndBundle:Venta");
        $venta = $venta_repo->find($nroventa);
        $precio=$articulo->getPrecio();
        if($descuento!=0 && $happy ){
            if($articulo->getHappy()){
                $precio=round($precio*(1-($descuento/100)));
            }
        }
        else if ($descuento!=0 && $articulo->getSocio()){
            $precio=round($precio*(1-($descuento/100)));
        }
        if ($item == null) {
            $socio_repo = $em->getRepository("FrontEndBundle:Socio");
            $socio = $socio_repo->find($nrosocio);
            $item = new ItemSocio();
            $item->setArticulo($articulo);
            $item->setVenta($venta);
            $item->setSocio($socio);
            $item->setCantidad(1);
            $item->setMonto($precio);
        } else {
            $item=$item[0];
            $item->sumarUno();
            $item->sumarAlMonto($precio);
        }
        
        $em->persist($item);
        $venta->setTotal( $venta->getTotal()+$precio);
        $em->persist($venta);
        
        $estado= new Estado();
        $estado->setArticulo($articulo);
        $estado->setVenta($venta);
        $estado->setNota($nota);
        ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
        $estado->setPedido(new \DateTime('now'));
        $em->persist($estado);
        $flush = $em->flush();
        
    }
    public function AgregarSocioVistaAction($nroventa){
        $em = $this->getDoctrine()->getManager();
        $socios = $em->getRepository("FrontEndBundle:Socio")->findBy(array(),array("nombre"=>"asc"));
        return $this->render("FrontEndBundle:Venta:socio.html.twig", array("nroventa" => $nroventa,"socios"=>$socios));
    }
    public function AgregarSocioAction($nroventa){
        
        $nro= $_GET["nrosocio"];
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Socio");
        $objeto = $obj_repo->find($nro);
        if($objeto!=null){
            
            return  $this->itemsSocioAction($nroventa, $nro);
        }
        else{
        return $this->redirectToRoute("ventas_mostrar",array("id"=>$nroventa));
        }
    }
    public function ModificarDescuentoVistaAction($nroventa){
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Venta");
        $objeto = $obj_repo->find($nroventa);
        return $this->render("FrontEndBundle:Venta:descuento.html.twig", array("venta" => $objeto));
    }
    public function ModificarDescuentoAction($nroventa){
        
        $descuento= $_GET["descuento"];
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Venta");
        $objeto = $obj_repo->find($nroventa);
        if( $objeto != null ){
            $objeto->setDescuento($descuento);
            $em->persist($objeto);
            $em->flush();
        }
        return $this->redirectToRoute("ventas_mostrar",array("id"=>$nroventa));
        
    }
    public function EliminarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Venta");
        $objeto = $obj_repo->find($id);
        if (count($objeto->nroVenta) == 0) {
            $em->remove($objeto);
        } else {
            $objeto->setAlta(0);
            $em->persist($objeto);
        }
        $em->flush();
        return $this->redirectToRoute("ventas");
    }
    public function CerrarAction($nroventa) {
        $em = $this->getDoctrine()->getManager();
        $obj_repo = $em->getRepository("FrontEndBundle:Venta");
        ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
        $objeto = $obj_repo->find($nroventa);
        $objeto->setCerrada(new \DateTime('now'));
        $caja= $objeto->getCajaDiaria();
        $caja->SumarVenta($objeto->getTotal());
        $em->persist($objeto);
        $em->persist($caja);
        $em->flush();
        return $this->redirectToRoute("ventas_mostrar",array("id"=>$nroventa));
    }


    public function AgregarAction(Request $request) {
        $objeto = new Venta();
        $form = $this->createForm(VentaType::class, $objeto);
        $form->handleRequest($request);
        $status = null;
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
                $query = $em->createQuery("SELECT e FROM FrontEndBundle\Entity\CajaDiaria e order by e.id desc ");
                $objCaja = $query->getResult();
                $objeto = new Venta();
                $objeto->setMesa($form->get("mesa")->getData());
                $objeto->setPersonas($form->get("personas")->getData());
                $objeto->setAbierta(new \DateTime('now'));
                $objeto->setDescuento(0);
                $objeto->setPuntos(0);
                $objeto->setUsuario($this->get("security.token_storage")->getToken()->getUser());
                $objeto->setCajadiaria($objCaja[0]);


                $em->persist($objeto);
                if ($em->flush() == null) {
                    $status = "Se agrego correctamente";
                } else {
                    $status = "Error al guardar la información";
                }
            } else {
                $status = "Arregle los errores marcados";
            }
            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute("ventas_mostrar",array("id"=>$objeto->getNro()));
        }
        return $this->render('FrontEndBundle:Venta:agregar.html.twig', array("form" => $form->createView()));
    }

}
