<?php

namespace FrontEndBundle\Entity;

/**
 * Socio
 */
class Socio
{
    /**
     * @var integer
     */
    private $nro;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $puntos;

    /**
     * Set nro
     *
     * @param integer $nro
     *
     * @return Socio
     */
    public function setNro($nro)
    {
        $this->nro = $nro;

        return $this;
    }
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Socio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return Socio
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
}
