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
        $table->createColumn('script', Type::varcharType(255));
        $table->createColumn('url', Type::varcharType(255));
        $table->createColumn('line', Type::integerType());
        $table->createColumn('column', Type::integerType());
        $table->createColumn('is_mobile', Type::integerType());
        $table->createColumn('is_tablet', Type::integerType());
        $table->createColumn('is_robot', Type::integerType());
        $table->createColumn('browser', Type::varcharType(255));
        $table->createColumn('browser_version', Type::varcharType(255));
        $table->createColumn('browser_width', Type::integerType());
        $table->createColumn('browser_height', Type::integerType());
        $table->createColumn('display_width', Type::integerType());
        $table->createColumn('display_height', Type::integerType());
        $table->createColumn('platform', Type::varcharType(255));
        $table->createColumn('user_agent', Type::varcharType(255));
        $table->createColumn('ip', Type::varcharType(64));
        $table->createColumn('created', Type::integerType());
        $table->createColumn('hash', Type::varcharType(255));
        
        $table->createIndex()->addColumn('created');
        
        return $table;
    }
    
}
