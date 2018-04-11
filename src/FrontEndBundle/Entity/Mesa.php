<?php

namespace FrontEndBundle\Entity;

/**
 * Mesa
 */
class Mesa
{
    /**
     * @var integer
     */
    private $nro;


    /**
     * Get nro
     *
     * @return integer
     */
    public function __toString() {
        return (string)$this->nro;
    }
    public function getNro()
    {
        return $this->nro;
    }
}
