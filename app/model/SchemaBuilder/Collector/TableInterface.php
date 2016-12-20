<?php

namespace Davajlama\SchemaBuilder\Collector;

/**
 * Description of TableInterface
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
interface TableInterface
{
    
    /** @return \Davajlama\SchemaBuilder\Schema\Table */
    public function createTable();
    
}
