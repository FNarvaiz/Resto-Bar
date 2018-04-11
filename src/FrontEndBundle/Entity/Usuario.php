<?php

namespace FrontEndBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use FrontEndBundle\Entity\Config;
/**
 * Usuario
 */
class Usuario implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $alta;
    
    /**
     * @var \FrontEndBundle\Entity\Permisos
     */
    private $permiso;
    /**
     * @var \FrontEndBundle\Entity\Config
     */
    // AUTH
    public function getUsername() {
        return $this->nombre;
    }
    public function getSalt() {
        return null;
    }
    public function getRoles() {
        return array($this->permiso);
    }
    public function eraseCredentials() {
        
    }
    
    // END AUTH

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
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
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set alta
     *
     * @param boolean $alta
     *
     * @return Usuario
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
     * Set permiso
     *
     * @param string $permiso
     *
     * @return Usuario
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;

        return $this;
    }

    /**
     * Get permiso
     *
     * @return string
     */
    public function getPermiso()
    {
        return $this->permiso;
    }
}
