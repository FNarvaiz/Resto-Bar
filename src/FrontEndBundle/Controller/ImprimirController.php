<?php
namespace FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use FrontEndBundle\Entity\Venta;
use FrontEndBundle\Entity\ItemSocio;
use FrontEndBundle\Entity\Item;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class ImprimirController extends Controller
{
    private $session;
    
    public function __construct() {
        $this->session= new Session();
    }
    public function Enfasis($printer,$texto){
        $printer -> setEmphasis(true);
        $printer -> text($texto);
        $printer -> setEmphasis(false);
        $printer -> feed();
    }
    public function ImprimirVentaAction($id){
        require __DIR__ . '/../escpos-php/autoload.php';
        //try {
            $em = $this->getDoctrine()->getManager();
            $venta_repo = $em->getRepository("FrontEndBundle:Venta");
            $venta = $venta_repo->find($id);
            $repo_ItemSocio = $em->getRepository("FrontEndBundle:ItemSocio");
            $repo_Item = $em->getRepository("FrontEndBundle:Item");
            $items_socios = $repo_ItemSocio->findBy(array("venta" => $venta));
            $items = $repo_Item->findBy(array("venta" => $venta));
       
            // Enter the share name for your USB printer here
            $connector = new WindowsPrintConnector("EPSON TM-T20II Receipt5");
            $printer = new Printer($connector);

            /* Start the printer */
            $logo = EscposImage::load(__DIR__ . '/../escpos-php/falso.jpg', false);
            
            /* Print top logo */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> graphics($logo);

            /* Name of shop */
            $printer -> selectPrintMode();
            //$printer -> text("Shop No. 42.\n");
            $printer -> feed();

            /* Title of receipt */
            $this->Enfasis($printer,"Venta ".$venta->getNro()."\n");
            
            /* Items socios*/
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $socio="";
            $subtotal=0;
            $subtotalGeneral=0;
            foreach ($items_socios as $item) {
                if($socio!=$item->getSocio()->getNombre())
                {
                    if($socio!=""){
                        $subtotalGeneral=$subtotalGeneral+$subtotal;
                        //$this->Enfasis($printer,$subtotal."\n");
                        $subtotal=0;
                    }
                    $socio=$item->getSocio()->getNombre();
                    $printer -> setEmphasis(true);
                    $printer -> text($socio."\n");
                    $printer -> setEmphasis(false);
                }
                $subtotal=$subtotal+$item->getMonto();
                $printer -> text($item);
            }
            $subtotalGeneral=$subtotalGeneral+$subtotal;
            
            $subtotalGeneral=$subtotal+$subtotalGeneral;
            //$printer -> text("Subtotal: $ ".$subtotalGeneral."\n");
            
            /* Items */
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $printer -> setEmphasis(true);
            $printer -> text("Otros\n");
            //$printer -> text(new item('', '$'));
            $printer -> setEmphasis(false);
            $subtotal=0;
            foreach ($items as $item) {
                $subtotal=$subtotal+$item->getMonto();
                
                $printer -> text($item);
            }
            
            //$this->Enfasis($printer,$subtotal);
            
            $subtotalGeneral=$subtotal+$subtotalGeneral;
            $printer -> setJustification(Printer::JUSTIFY_RIGHT);
            //$printer -> text("Subtotal: $ ".$subtotalGeneral."\n");

            
            if($venta->getDescuento()>0)
            {
                $printer -> setJustification(Printer::JUSTIFY_LEFT);
                $printer -> text("Descuento");
                $printer -> setJustification(Printer::JUSTIFY_RIGHT);
                $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                $printer -> text("$ ".$venta->getDescuento()."\n");
            }
            /* Tax and total */
            
            $printer -> setJustification(Printer::JUSTIFY_RIGHT);
            $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer -> text("$ ".$venta->getTotal());
            $printer -> selectPrintMode();

            /* Footer */
            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> text("Gracias por tomar en nuestro bar\n");
            //$printer -> text("For trading hours, please visit example.com\n");
            $printer -> feed(2);

            /* Cut the receipt and open the cash drawer */
            $printer -> cut();
            $printer -> pulse();

            $printer -> close();
            
            return $this->redirectToRoute("ventas");
        /*} catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }*/
    }
    public function indexAction(){
       $em= $this->getDoctrine()->getManager();
       $obj_repo= $em->getRepository("FrontEndBundle:Clima");
       $objetos=$obj_repo->findAll();
       return $this->render("FrontEndBundle:Clima:index.html.twig",array("climas"=>$objetos));
    }
    
    
}