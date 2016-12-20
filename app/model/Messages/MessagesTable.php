<?php

namespace App\Messages;

use Davajlama\SchemaBuilder\Collector\TableInterface;
use Davajlama\SchemaBuilder\Schema\Table;
use Davajlama\SchemaBuilder\Schema\Type;

/**
 * Description of MessagesTable
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class MessagesTable implements TableInterface
{

    public function createTable()
    {
        $table = new Table('messages');
        $table->createId();
        $table->createColumn('target', Type::integerType());
        $table->createColumn('message', Type::varcharType(255));
        $table->createColumn('url', Type::varcharType(255));
        $table->createColumn('line', Type::integerType());
        $table->createColumn('column', Type::integerType());
        $table->createColumn('created', Type::integerType());
        $table->createColumn('hash', Type::varcharType(255));
        
        return $table;
    }
    
}
