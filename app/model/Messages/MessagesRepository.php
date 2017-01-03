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
     * @return FilterQuery
     */
    public function getFilterQuery()
    {
        return new FilterQuery($this);
    }

    /**
     * @return Message[]
     */
    public function findAllNewest($limit = null)
    {
        $selection = $this->getTable()->select('*, count(*) cnt')
                        ->group('hash')
                        ->order('created DESC');
        
        if($limit) {
            $selection->limit($limit);
        }
        
        $list = [];
        foreach($selection as $row) {
            $list[] = $entity = $this->mapToObject($row);
            $entity->setOther('count', $row->cnt);
        }
        
        return $list;
    }
    
    public function findNewsetByHash($hash, $limit = null)
    {
        $selection = $this->getTable()
                        ->where('hash = ?', $hash)
                        ->order('created DESC');
        
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
            'id'                => $entity->getId(),
            'target'            => $entity->getTarget(),
            'message'           => $entity->getMessage(),
            'script'            => $entity->getScript(),
            'url'               => $entity->getUrl(),
            'line'              => $entity->getLine(),
            'column'            => $entity->getColumn(),
            'snippet'           => $entity->getSnippet(),
            'hash'              => $entity->getHash(),
            'created'           => $entity->getCreated(),
            'is_mobile'         => $entity->isMobile(),
            'is_tablet'         => $entity->isTablet(),
            'is_robot'          => $entity->isRobot(),
            'browser'           => $entity->getBrowser(),
            'browser_version'   => $entity->getBrowserVersion(),
            'browser_width'     => $entity->getBrowserWidth(),
            'browser_height'    => $entity->getBrowserHeight(),
            'display_width'     => $entity->getDisplayWidth(),
            'display_height'    => $entity->getDisplayHeight(),
            'platform'          => $entity->getPlatform(),
            'user_agent'        => $entity->getUserAgent(),
            'ip'                => $entity->getIp(),
        ];
    }
    
    public function mapToObject($row)
    {
        $entity = new Message($row->id);
        $entity->setTarget($row->target);
        $entity->setMessage($row->message);
        $entity->setScript($row->script);
        $entity->setUrl($row->url);
        $entity->setLine($row->line);
        $entity->setColumn($row->column);
        $entity->setHash($row->hash);
        $entity->setCreated($row->created);
        $entity->setMobile($row->is_mobile);
        $entity->setTablet($row->is_tablet);
        $entity->setRobot($row->is_robot);
        $entity->setBrowser($row->browser);
        $entity->setBrowserVersion($row->browser_version);
        $entity->setBrowserWidth($row->browser_width);
        $entity->setBrowserHeight($row->browser_height);
        $entity->setDisplayWidth($row->display_width);
        $entity->setDisplayHeight($row->display_height);
        $entity->setPlatform($row->platform);
        $entity->setUserAgent($row->user_agent);
        $entity->setIp($row->ip);
        $entity->setSnippet($row->snippet);
        
        return $entity;
    }
    
    public function getTable()
    {
        return $this->getAdapter()->table('messages');
    }
    
}
