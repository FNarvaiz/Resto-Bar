<?php

namespace FrontEndBundle\Entity;

/**
 * Estado
 */
class Estado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $pedido;
    /**
     * @var \DateTime
     */
    private $listo;
    /**
     * @var \DateTime
     */
    private $servido;
     /**
     * @var string
     */
    private $nota;
    /**
     * @var \FrontEndBundle\Entity\Articulo
     */
    private $articulo;

    /**
     * @var \FrontEndBundle\Entity\Venta
     */
    private $venta;


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
     * Set nota
     *
     * @param string $nota
     *
     * @return Estado
     */
    
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }
    /**
     * Set pedido
     *
     * @param \DateTime $pedido
     *
     * @return Estado
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return \DateTime
     */
    public function getPedido()
    {
        return $this->pedido;
    }
    /**
     * Set listo
     *
     * @param \DateTime $listo
     *
     * @return Estado
     */
    public function setListo($listo)
    {
        $this->listo = $listo;

        return $this;
    }

    /**
     * Get listo
     *
     * @return \DateTime
     */
    public function getListo()
    {
        return $this->listo;
    }
    /**
     * Set servido
     *
     * @param \DateTime $servido
     *
     * @return Estado
     */
    public function setServido($servido)
    {
        $this->servido = $servido;

        return $this;
    }

    /**
     * Get servido
     *
     * @return \DateTime
     */
    public function getServido()
    {
        return $this->servido;
    }
    /**
     * Set articulo
     *
     * @param \FrontEndBundle\Entity\Articulo $articulo
     *
     * @return Estado
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

    /**
     * Set venta
     *
     * @param \FrontEndBundle\Entity\Venta $venta
     *
     * @return Estado
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
}

