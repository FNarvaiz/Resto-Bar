<?php

namespace FrontEndBundle\Entity;

/**
 * ItemSocio
 */
class ItemSocio
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
     * @var integer
     */
    private $puntos;

    /**
     * @var \FrontEndBundle\Entity\Socio
     */
    private $socio;

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
     * @return ItemSocio
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

    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return ItemSocio
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

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
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return ItemSocio
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }
    public function sumarPuntos($puntos){
        $this->puntos += $puntos;
        return $this;
    }

    /**
     * Get puntos
     *
     * @return integer
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set socio
     *
     * @param \FrontEndBundle\Entity\Socio $socio
     *
     * @return ItemSocio
     */
    public function setSocio(\FrontEndBundle\Entity\Socio $socio = null)
    {
        $this->socio = $socio;

        return $this;
    }
    public function sumarUno()
    {
        $this->cantidad = $this->cantidad +1;
    }
    public function sumarAlMonto($importe){
        $this->monto += $importe;
        return $this;
    }

    /**
     * Get socio
     *
     * @return \FrontEndBundle\Entity\Socio
     */
    public function getSocio()
    {
        return $this->socio;
    }

    /**
     * Set venta
     *
     * @param \FrontEndBundle\Entity\Venta $venta
     *
     * @return ItemSocio
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
     * @return ItemSocio
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
        
        $left = str_pad($this->getCantidad(). ' '.$this->getArticulo()->getNombre(), $leftCols) ;
        if($this->getPuntos()>0){
            $right = str_pad('P '.$this->getPuntos(). ' $ ' . $this->getMonto(), $rightCols, ' ', STR_PAD_LEFT);
        }
        else{
            $right = str_pad('$ ' . $this->getMonto(), $rightCols, ' ', STR_PAD_LEFT);
        }
        return "$left$right\n";
    }
}
