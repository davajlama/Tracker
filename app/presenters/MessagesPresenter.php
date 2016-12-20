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
    
}
