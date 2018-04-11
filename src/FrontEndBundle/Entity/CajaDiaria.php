<?php

namespace FrontEndBundle\Entity;

/**
 * CajaDiaria
 */
class CajaDiaria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var boolean
     */
    private $evento;

    /**
     * @var string
     */
    private $monto;
    
    /**
     * @var string
     */
    private $totalventa;

    /**
     * @var \FrontEndBundle\Entity\Clima
     */
    private $idclima;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return CajaDiaria
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set evento
     *
     * @param boolean $evento
     *
     * @return CajaDiaria
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get evento
     *
     * @return boolean
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return CajaDiaria
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
     * Set totalventa
     *
     * @param string $totalventa
     *
     * @return CajaDiaria
     */
    public function setTotalVenta($totalventa)
    {
        $this->totalventa = $totalventa;

        return $this;
    }
    public function SumarVenta($monto)
    {
        $this->totalventa = $this->totalventa+$monto;

        return $this;
    }
    /**
     * Get totalVenta
     *
     * @return string
     */
    public function getTotalVenta()
    {
        return $this->totalventa;
    }

    /**
     * Set idclima
     *
     * @param \FrontEndBundle\Entity\Clima $idclima
     *
     * @return CajaDiaria
     */
    public function setIdclima(\FrontEndBundle\Entity\Clima $idclima = null)
    {
        $this->idclima = $idclima;

        return $this;
    }

    /**
     * Get idclima
     *
     * @return \FrontEndBundle\Entity\Clima
     */
    public function getIdclima()
    {
        return $this->idclima;
    }
}
