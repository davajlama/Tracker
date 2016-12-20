<?php

namespace App\Targets;

use App\BaseRepository;
use Nette\Database\Table\Selection;

/**
 * Description of TargetsRepository
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class TargetsRepository extends BaseRepository
{

    /**
     * @param Target $entity
     * @return int
     */
    public function insert(Target $entity)
    {
        $this->getTable()->insert($this->mapToArray($entity));
                
        return $this->getAdapter()->getInsertId();
    }

    /**
     * @param string $host
     * @return Target
     */
    public function findByHost($host)
    {
        $row = $this->getTable()->where('host = ?', $host)->fetch();
        if($row) {
            return $this->mapToObject($row);
        }
    }
    
    /**
     * @return Target[]
     */
    public function findAll()
    {
        $list = [];
        foreach($this->getTable()->fetchAll() as $row) {
            $list[] = $this->mapToObject($row);
        }
        
        return $list;
    }
    
    /**
     * @param Target $entity
     * @return array
     */
    public function mapToArray(Target $entity)
    {
        return [
            'id'    => $entity->getId(),
            'name'  => $entity->getName(),
            'host'  => $entity->getHost(),
        ];
    }
    
    /**
     * @param array $row
     * @return \App\Targets\Target
     */
    public function mapToObject($row)
    {
        $entity = new Target($row->id);
        $entity->setName($row->name);
        $entity->setHost($row->host);
        
        return $entity;
    }
    
    /**
     * @return Selection
     */
    public function getTable()
    {
        return $this->getAdapter()->table('targets');
    }
    
}
