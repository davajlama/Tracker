<?php

namespace App\Presenters;

/**
 * Description of LoggerPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class LoggerPresenter extends \Nette\Application\UI\Presenter
{
    
    public function actionLog()
    {
        
        $one = print_r($this->getRequest()->getPost('data'), true);
        $two = print_r($this->getRequest()->getPost(), true);
        
        file_put_contents(__DIR__ . '/foo.txt', $one . $two);
        
        $this->terminate();
    }
    
}
