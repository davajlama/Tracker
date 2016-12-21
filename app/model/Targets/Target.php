<?php

namespace App\Targets;

/**
 * Description of Target
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class Target
{
    /** @var int */
    private $id;
    
    /** @var string */
    private $name;
    
    /** @var string */
    private $host;
    
    /** @var int */
    private $active;
    
    /** @var int */
    private $deleted = 0;
    
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
        
    public function getName()
    {
        return $this->name;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
    
    public function isDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

}
