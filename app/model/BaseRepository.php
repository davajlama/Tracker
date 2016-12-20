<?php

namespace App;

use Nette\Database\Context;

/**
 * Description of BaseRepository
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class BaseRepository
{
    /** @var Context */
    private $context;
    
    public function __construct(Context $context)
    {
        $this->context = $context;
    }
    
    /**
     * @return Context
     */
    public function getAdapter()
    {
        return $this->context;
    }
}
