<?php

namespace FrontEndBundle\Entity;

/**
 * Articulo
 */
class Articulo
{
    /**
     * @var integer
     */
    private $codigo;

    /**
     * @var string
     */
    private $nombre;
     /**
     * @var integer
     */
    private $promedio;

     /**
     * @var integer
     */
    private $puntos;

    
    /**
     * @var string
     */
    private $precio;

    /**
     * @var boolean
     */
    private $cocina;
    /**
     * @var boolean
     */
    private $socio;
    /**
     * @var boolean
     */
    private $happy;
    /**
     * @var boolean
     */
    private $bar;

    /**
     * @var boolean
     */
    private $alta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $articulos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articulos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set happy
     *
     * @param boolean $happy
     *
     * @return Articulo
     */
    public function setHappy($happy)
    {
        $this->happy = $happy;

        return $this;
    }

    /**
     * Get happy
     *
     * @return boolean
     */
    public function getHappy()
    {
        return $this->happy;
    }
    /**
     * Set socio
     *
     * @param boolean $socio
     *
     * @return Articulo
     */
    public function setSocio($socio)
    {
        $this->socio = $socio;

        return $this;
    }

    /**
     * Get socio
     *
     * @return boolean
     */
    public function getSocio()
    {
        return $this->socio;
    }
    /**
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return Articulo
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
     * Set promedio
     *
     * @param integer $promedio
     *
     * @return ItemSocio
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;

        return $this;
    }

    /**
     * Get promedio
     *
     * @return integer
     */
    public function getPromedio()
    {
        return $this->promedio;
    }
/**
     * Set codigo
     *
     * @param integer $codigo
     *
     * @return Articulo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
    /**
     * Get codigo
     *
     * @return integer
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Articulo
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
     * Set precio
     *
     * @param string $precio
     *
     * @return Articulo
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cocina
     *
     * @param boolean $cocina
     *
     * @return Articulo
     */
    public function setCocina($cocina)
    {
        $this->cocina = $cocina;

        return $this;
    }

    /**
     * Get cocina
     *
     * @return boolean
     */
    public function getCocina()
    {
        return $this->cocina;
    }

    /**
     * Set bar
     *
     * @param boolean $bar
     *
     * @return Articulo
     */
    public function setBar($bar)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return boolean
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set alta
     *
     * @param boolean $alta
     *
     * @return Articulo
     */
    public function setAlta($alta)
    {
        $this->alta = $alta;

        return $this;
    }

    /**
     * Get alta
     *
     * @return boolean
     */
    public function getAlta()
    {
        return $this->alta;
    }

    /**
     * Add codigoarticulo
     *
     * @param \FrontEndBundle\Entity\Articulo $codigoarticulo
     *
     * @return Articulo
     */
    public function addCodigoarticulo(\FrontEndBundle\Entity\Articulo $codigoarticulo)
    {
        $this->codigoarticulo[] = $codigoarticulo;

        return $this;
    }

    /**
     * Remove articulos
     *
     * @param \FrontEndBundle\Entity\Articulo $articulo
     */
    public function removeArticulos(\FrontEndBundle\Entity\Articulo $articulo)
    {
        $this->articulos->removeElement($articulo);
    }

    /**
     * Get codigoarticulo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

}
