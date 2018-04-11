<?php

namespace FrontEndBundle\Entity;

/**
 * Venta
 */
class Venta
{
    /**
     * @var integer
     */
    private $nro;

    /**
     * @var \FrontEndBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \DateTime
     */
    private $abierta;

    /**
     * @var integer
     */
    private $puntos;

    /**
     * @var \DateTime
     */
    private $cerrada;

    /**
     * @var string
     */
    private $descuento;
    
    /**
     * @var string
     */
    private $total;

    /**
     * @var integer
     */
    private $personas = '1';

    /**
     * @var \FrontEndBundle\Entity\Mesa
     */
    private $mesa;

    /**
     * @var \FrontEndBundle\Entity\CajaDiaria
     */
    private $cajadiaria;


    /**
     * Get nro
     *
     * @return integer
     */
    public function getNro()
    {
        return $this->nro;
    }

    

    /**
     * Set abierta
     *
     * @param \DateTime $abierta
     *
     * @return Venta
     */
    public function setAbierta($abierta)
    {
        $this->abierta = $abierta;

        return $this;
    }

    /**
     * Get abierta
     *
     * @return \DateTime
     */
    public function getAbierta()
    {
        return $this->abierta;
    }

    /**
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return Venta
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

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
     * Set cerrada
     *
     * @param \DateTime $cerrada
     *
     * @return Venta
     */
    public function setCerrada($cerrada)
    {
        $this->cerrada = $cerrada;

        return $this;
    }

    /**
     * Get cerrada
     *
     * @return \DateTime
     */
    public function getCerrada()
    {
        return $this->cerrada;
    }

    /**
     * Set descuento
     *
     * @param string $descuento
     *
     * @return Venta
     */
    public function setDescuento($descuento)
    {
        $this->total=$this->total+$this->descuento-$descuento;
        
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return string
     */
    public function getDescuento()
    {
        return $this->descuento;
    }
    /**
     * Set total
     *
     * @param string $total
     *
     * @return Venta
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Set personas
     *
     * @param integer $personas
     *
     * @return Venta
     */
    public function setPersonas($personas)
    {
        $this->personas = $personas;

        return $this;
    }

    /**
     * Get personas
     *
     * @return integer
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * Set mesa
     *
     * @param \FrontEndBundle\Entity\Mesa $mesa
     *
     * @return Venta
     */
    public function setMesa(\FrontEndBundle\Entity\Mesa $mesa = null)
    {
        $this->mesa = $mesa;

        return $this;
    }

    /**
     * Get mesa
     *
     * @return \FrontEndBundle\Entity\Mesa
     */
    public function getMesa()
    {
        return $this->mesa;
    }
    /**
     * Set usuario
     *
     * @param \FrontEndBundle\Entity\Usuario $usuario
     *
     * @return Venta
     */
    public function setUsuario(\FrontEndBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \FrontEndBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set cajadiaria
     *
     * @param \FrontEndBundle\Entity\CajaDiaria $cajadiaria
     *
     * @return Venta
     */
    public function setCajadiaria(\FrontEndBundle\Entity\CajaDiaria $cajadiaria = null)
    {
        $this->cajadiaria = $cajadiaria;

        return $this;
    }

    /**
     * Get cajadiaria
     *
     * @return \FrontEndBundle\Entity\CajaDiaria
     */
    public function getCajadiaria()
    {
        return $this->cajadiaria;
    }
}
