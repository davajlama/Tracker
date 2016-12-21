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
    private $script;
    
    /** @var string */
    private $url;
    
    /** @var int */
    private $line;
    
    /** @var int */
    private $column;
    
    /** @var int */
    private $isMobile;
    
    /** @var int */
    private $isTablet;
    
    /** @var int */
    private $isRobot;
    
    /** @var string */
    private $browser;
    
    /** @var string */
    private $browserVersion;
    
    /** @var int */
    private $browserWidth;
    
    /** @var int */
    private $browserHeight;
    
    /** @var int */
    private $displayWidth;
    
    /** @var int */
    private $displayHeight;
    
    /** @var string */
    private $platform;
    
    /** @var string */
    private $userAgent;
    
    /** @var string */
    private $ip;
    
    /** @var string */
    private $hash;
    
    /** @var int */
    private $created;
    
    /** @var array */
    private $others = [];
    
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

    public function getScript()
    {
        return $this->script;
    }

    public function isMobile()
    {
        return $this->isMobile;
    }

    public function isTablet()
    {
        return $this->isTablet;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function getBrowserVersion()
    {
        return $this->browserVersion;
    }

    public function getBrowserWidth()
    {
        return $this->browserWidth;
    }

    public function getBrowserHeight()
    {
        return $this->browserHeight;
    }

    public function getDisplayWidth()
    {
        return $this->displayWidth;
    }

    public function getDisplayHeight()
    {
        return $this->displayHeight;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setScript($script)
    {
        $this->script = $script;
        return $this;
    }

    public function setMobile($isMobile)
    {
        $this->isMobile = $isMobile;
        return $this;
    }

    public function setTablet($isTablet)
    {
        $this->isTablet = $isTablet;
        return $this;
    }

    public function setBrowser($browser)
    {
        $this->browser = $browser;
        return $this;
    }

    public function setBrowserVersion($browserVersion)
    {
        $this->browserVersion = $browserVersion;
        return $this;
    }

    public function setBrowserWidth($browserWidth)
    {
        $this->browserWidth = $browserWidth;
        return $this;
    }

    public function setBrowserHeight($browserHeight)
    {
        $this->browserHeight = $browserHeight;
        return $this;
    }

    public function setDisplayWidth($displayWidth)
    {
        $this->displayWidth = $displayWidth;
        return $this;
    }

    public function setDisplayHeight($displayHeight)
    {
        $this->displayHeight = $displayHeight;
        return $this;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
        return $this;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }
    
    public function isRobot()
    {
        return $this->isRobot;
    }

    public function setRobot($isRobot)
    {
        $this->isRobot = $isRobot;
        return $this;
    }
    
    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }
    
    public function setOther($key, $value)
    {
        $this->others[$key] = $value;
        return $this;
    }
    
    public function getOther($key, $default = null)
    {
        return array_key_exists($key, $this->others) ? $this->others[$key] : $default;
    }
    
}