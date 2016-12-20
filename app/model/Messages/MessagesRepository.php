<?php

namespace App\Messages;

/**
 * Description of MessagesRepository
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class MessagesRepository extends \App\BaseRepository
{
    
    public function insert(Message $entity)
    {
        $this->getTable()->insert($this->mapToArray($entity));
    }
    
    /**
     * @return Message[]
     */
    public function findAllNewest($limit = null)
    {
        $selection = $this->getTable()->order('created DESC');
        
        if($limit) {
            $selection->limit($limit);
        }
        
        $list = [];
        foreach($selection as $row) {
            $list[] = $this->mapToObject($row);
        }
        
        return $list;
    }
    
    public function mapToArray(Message $entity)
    {
        return [
            'id'        => $entity->getId(),
            'target'    => $entity->getTarget(),
            'message'   => $entity->getMessage(),
            'url'       => $entity->getUrl(),
            'line'      => $entity->getLine(),
            'column'    => $entity->getColumn(),
            'hash'      => $entity->getHash(),
            'created'   => $entity->getCreated(),
        ];
    }
    
    public function mapToObject($row)
    {
        $entity = new Message($row->id);
        $entity->setTarget($row->target);
        $entity->setMessage($row->message);
        $entity->setUrl($row->url);
        $entity->setLine($row->line);
        $entity->setColumn($row->column);
        $entity->setHash($row->hash);
        $entity->setCreated($row->created);
        
        return $entity;
    }
    
    public function getTable()
    {
        return $this->getAdapter()->table('messages');
    }
    
}
