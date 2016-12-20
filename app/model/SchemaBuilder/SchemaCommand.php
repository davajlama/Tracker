<?php

namespace Davajlama\SchemaBuilder;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SchemaCommand extends \Symfony\Component\Console\Command\Command
{
    
    protected function configure()
    {
        $this->setName('schema:update')
                ->setDescription('Schema create or update')
                ->addOption('dump', null, null, "Dump the SQL patches")
                ->addOption('force', null, null, "Force execute SQL patches");
                
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $container \Nette\DI\Container */
        $container = $this->getHelper('container')->getContainer();

        /* @var $connection \Nette\Database\Connection */
        $connection = $container->getByType(\Nette\Database\Connection::class);
        
        $list = $container->findByTag('schemabuilder.collector.table');
        
        $schema = new Schema();
        foreach($list as $service => $foo) {
            $factory = $container->getService($service);
            $schema->addTable($factory->createTable());
        }
        
        $adapter    = new Bridge\NetteDatabaseAdapter($connection);
        $driver     = new Driver\MySqlDriver($adapter);
        $builder    = new SchemaBuilder($driver);
        $creator    = new SchemaCreator($driver);
        
        $patches = $builder->buildSchemaPatches($schema);
        
        if($patches->count() === 0) {
            $output->writeln('Nothing to update');
            return;
        }
        
        if($dump = $input->getOption('dump')) {
            foreach($patches->toArray() as $patch) {
                $output->writeln($patch->getQuery());
            }
        }
        
        if($force = $input->getOption('force')) {
            $creator->applyPatches($patches);
        }
        
        if(empty($dump) && empty($force)) {
            $output->writeln("You must type one of options [dump, force]");
        }
    }
    
}
