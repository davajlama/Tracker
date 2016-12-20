<?php

namespace App\Messages;

/**
 * Description of Message
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class Message
{
    /** @var int */
    private $id;
    
    /** @var int */
    private $target;
    
    /** @var string */
    private $message;
    
    /** @var string */
    private $url;
    
    /** @var int */
    private $line;
    
    /** @var int */
    private $column;
    
    /** @var string */
    private $hash;
    
    /** @var int */
    private $created;
    
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function getColumn()
    {
        return $this->column;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setLine($line)
    {
        $this->line = $line;
        return $this;
    }

    public function setColumn($column)
    {
        $this->column = $column;
        return $this;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

}