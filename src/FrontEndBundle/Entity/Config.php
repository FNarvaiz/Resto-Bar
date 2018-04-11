<?php

namespace FrontEndBundle\Entity;

/**
 * Estado
 */
class Config
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $inicio;
    /**
     * @var \DateTime
     */
    private $fin;
    /**
     * @var string
     */
    private $socio;
     /**
     * @var string
     */
    private $happy;
    
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
     * Set inicio
     *
     * @param \DateTime $inicio
     *
     * @return Config
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio; 
        return $this;
    }

    /**
     * Get inicio
     *
     * @return \DateTime
     */
    public function getInicio()
    {
        return $this->inicio;
    }
    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Config
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }
    /**
     * Set socio
     *
     * @param string $socio
     *
     * @return Config
     */
    public function setSocio($socio)
    {
        $this->socio = $socio;

        return $this;
    }

    /**
     * Get socio
     *
     * @return string
     */
    public function getSocio()
    {
        return $this->socio;
    }
    /**
     * Set happy
     *
     * @param string $happy
     *
     * @return Config
     */
    public function setHappy($happy)
    {
        $this->happy = $happy;

        return $this;
    }

    /**
     * Get happy
     *
     * @return string
     */
    public function getHappy()
    {
        return $this->happy;
    }
}

