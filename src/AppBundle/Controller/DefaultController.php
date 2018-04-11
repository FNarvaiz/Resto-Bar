<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/Lista", name="homepage")
     */
    public function indexAction()
    {
        
        $em= $this->getDoctrine()->getManager();
        $repo= $em->getRepository("FrontEndBundle:Usuario");
        $objetos= $repo->findAll();
        
        foreach($objetos as $objeto){
            echo $objeto->getNombre()."<br/>";
            echo $objeto->getPermiso()->getNombre()."<br/>";
        }
        die();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
