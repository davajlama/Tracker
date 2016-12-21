<?php

namespace App\Presenters;

/**
 * Description of MessagesPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class MessagesPresenter extends SecretPresenter
{
    /** @var \App\Messages\MessagesRepository @inject */
    public $messagesRepository;
    
    public function actionList()
    {
        $this->template->list = $this->messagesRepository->findAllNewest(100);
    }
    
    public function actionDetail($hash)
    {
        $list = $this->messagesRepository->findNewsetByHash($hash, 100);
        
        if(empty($list)) {
            $this->redirect('list');
        }
        
        $this->template->base = reset($list);
        $this->template->list = $list;
    }
}
