<?php

namespace App\Presenters;

/**
 * Description of SecretPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class SecretPresenter extends \Nette\Application\UI\Presenter
{
    
    public function startup()
    {
        parent::startup();
        
        if(!$this->getUser()->isLoggedIn()) {
            $this->redirect('Login:login');
        }
        
    }
    
}
