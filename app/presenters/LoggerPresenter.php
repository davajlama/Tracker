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
    
    /** @var \Nette\Http\Request @inject */
    public $httpRequest;
    
    public function actionLog()
    {
        $json = $this->getRequest()->getPost('data');
        $data = \Nette\Utils\Json::decode($json);
        
        $host = isset($data->host) ? $data->host : null;
        
        if($host && $target = $this->targetsRepository->findByHost($host)) {
            
            if($target->isActive()) {
                $this->log($target, $data);
                $this->terminate();
            }
        }
        
        $this->response->setCode(\Nette\Http\Response::S403_FORBIDDEN);
        $this->terminate();
    }
    
    protected function getValue($object, $key, $default = null)
    {
        return isset($object->$key) ? $object->$key : $default;
    }
    
    protected function log(\App\Targets\Target $target, $data)
    {
        $browser = new \Browser();
            
        $url = null;
        if($referer = $this->httpRequest->getReferer()) {
            $url = $referer->getAbsoluteUrl();
        }

        $entity = new \App\Messages\Message();
        $entity->setTarget($target->getId());
        $entity->setMessage($this->getValue($data, 'message'));
        $entity->setScript($this->getValue($data, 'script'));
        $entity->setLine($this->getValue($data, 'line'));
        $entity->setColumn($this->getValue($data, 'column'));
        $entity->setUrl($url);
        $entity->setIp($this->httpRequest->getRemoteAddress());

        $entity->setBrowser($browser->getBrowser());
        $entity->setBrowserVersion($browser->getVersion());
        $entity->setPlatform($browser->getPlatform());
        $entity->setMobile($browser->isMobile());
        $entity->setTablet($browser->isTablet());
        $entity->setRobot($browser->isRobot());
        $entity->setUserAgent($browser->getUserAgent());

        $entity->setBrowserHeight($this->getValue($data, 'browser_height'));
        $entity->setBrowserWidth($this->getValue($data, 'browser_width'));
        $entity->setDisplayHeight($this->getValue($data, 'display_height'));
        $entity->setDisplayWidth($this->getValue($data, 'display_width'));

        $this->messagesStore->store($entity);
    }
}
