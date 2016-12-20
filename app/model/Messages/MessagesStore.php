<?php

namespace App\Messages;

/**
 * Description of MessagesStore
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class MessagesStore
{
    /** @var \App\Messages\MessagesRepository */
    private $messagesRepository;
    
    public function __construct(\App\Messages\MessagesRepository $messagesRepository)
    {
        $this->messagesRepository = $messagesRepository;
    }

    public function store(Message $entity)
    {
        $hash = md5($entity->getMessage() . $entity->getUrl() . $entity->getLine() . $entity->getColumn());
        
        $entity->setCreated(time());
        $entity->setHash($hash);
        
        $this->messagesRepository->insert($entity);
    }
}
