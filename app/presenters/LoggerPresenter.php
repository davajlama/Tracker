<?php

namespace App\Presenters;

/**
 * Description of LoggerPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class LoggerPresenter extends \Nette\Application\UI\Presenter
{
    /** @var \App\Targets\TargetsRepository @inject */
    public $targetsRepository;
    
    /** @var \App\Messages\MessagesStore @inject */
    public $messagesStore;
    
    /** @var \Nette\Http\Response @inject */
    public $response;
    
    public function actionLog()
    {
        $json = $this->getRequest()->getPost('data');
        $data = \Nette\Utils\Json::decode($json);
        
        $host = isset($data->host) ? $data->host : null;
        
        if($host && $target = $this->targetsRepository->findByHost($host)) {
            
            $entity = new \App\Messages\Message();
            $entity->setTarget($target->getId());
            $entity->setMessage($this->getValue($data, 'message'));
            $entity->setUrl($this->getValue($data, 'url'));
            $entity->setLine($this->getValue($data, 'line'));
            $entity->setColumn($this->getValue($data, 'column'));
            
            $this->messagesStore->store($entity);
            $this->terminate();
        }
        
        $this->response->setCode(\Nette\Http\Response::S403_FORBIDDEN);
        $this->terminate();
    }
    
    protected function getValue($object, $key, $default = null)
    {
        return isset($object->$key) ? $object->$key : $default;
    }
}
