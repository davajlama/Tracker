<?php

namespace App\Targets;

use Davajlama\SchemaBuilder\Collector\TableInterface;
use Davajlama\SchemaBuilder\Schema\Table;
use Davajlama\SchemaBuilder\Schema\Type;
use Davajlama\SchemaBuilder\Schema\Value;

/**
 * Description of TargetsTable
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class TargetsTable implements TableInterface
{
    
    public function createTable()
    {
        $table = new Table('targets');
        $table->createId();
        $table->createColumn('name', Type::varcharType(255));
        $table->createColumn('host', Type::varcharType(255));
        $table->createColumn('active', Type::tinyIntType());
        $table->createColumn('deleted', Type::tinyIntType())
                    ->nullable(false)
                    ->setDefaultValue(Value::numberValue(0));
        
        return $table;
    }
    
}
