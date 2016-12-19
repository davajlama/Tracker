<?php

namespace App\Tables;

/**
 * Description of MessagesTable
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class MessagesTable implements \Davajlama\SchemaBuilder\Collector\TableInterface
{

    public function createTable()
    {
        $table = new \Davajlama\SchemaBuilder\Schema\Table('messages');
        $table->createId();
        $table->createColumn('source', \Davajlama\SchemaBuilder\Schema\Type::integerType());
        $table->createColumn('message', \Davajlama\SchemaBuilder\Schema\Type::varcharType(255));
        
        return $table;
    }
    
}
