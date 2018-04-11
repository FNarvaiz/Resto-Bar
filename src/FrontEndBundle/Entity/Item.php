<?php

namespace FrontEndBundle\Entity;

/**
 * Item
 */
class Item
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var \FrontEndBundle\Entity\Venta
     */
    private $venta;

    /**
     * @var \FrontEndBundle\Entity\Articulo
     */
    private $articulo;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Item
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function sumarUno()
    {
        $this->cantidad = $this->cantidad +1;
    }
    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return Item
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }
    public function sumarAlMonto($importe){
        $this->monto += $importe;
        return $this;
    }
    
    /**
     * Get monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set venta
     *
     * @param \FrontEndBundle\Entity\Venta $venta
     *
     * @return Item
     */
    public function setVenta(\FrontEndBundle\Entity\Venta $venta = null)
    {
        $this->venta = $venta;

        return $this;
    }

    /**
     * Get venta
     *
     * @return \FrontEndBundle\Entity\Venta
     */
    public function getVenta()
    {
        return $this->venta;
    }

    /**
     * Set articulo
     *
     * @param \FrontEndBundle\Entity\Articulo $articulo
     *
     * @return Item
     */
    public function setArticulo(\FrontEndBundle\Entity\Articulo $articulo = null)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return \FrontEndBundle\Entity\Articulo
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 38;
        
        $left = str_pad($this->getCantidad(). ' '. $this->getArticulo()->getNombre(), $leftCols) ;
        
        $right = str_pad('$ ' . $this->getMonto(), $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}
