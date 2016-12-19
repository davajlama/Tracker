<?php

namespace App\Presenters;

/**
 * Description of ScriptPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class ScriptPresenter extends \Nette\Application\UI\Presenter
{
    /** @var \Nette\Http\Response @inject */
    public $response;
    
    public function actionMaster()
    {
        $this->response->setHeader('Content-Type', 'application/javascript');
    }
    
}
