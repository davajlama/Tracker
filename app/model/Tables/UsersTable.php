<?php

namespace App\Tables;

/**
 * Description of UsersTable
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class UsersTable implements \Davajlama\SchemaBuilder\Collector\TableInterface
{
    
    public function createTable()
    {
        $table = new \Davajlama\SchemaBuilder\Schema\Table('users');
        $table->createId();
        $table->createColumn('username', \Davajlama\SchemaBuilder\Schema\Type::varcharType(64));
        $table->createColumn('password', \Davajlama\SchemaBuilder\Schema\Type::varcharType(64));
        
        return $table;
    }
    
}
