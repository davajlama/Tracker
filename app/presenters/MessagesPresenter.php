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
    
    /** @var \Nette\Http\Request @inject */
    public $request;

    public function actionList()
    {
        $filter = $this->messagesRepository->getFilterQuery();

        if($url = $this->request->getQuery('url')) {
            $filter->whereUrlContain($url);
        }

        $this->template->list = $filter->limit(150)->fetchAll();
        $this->template->filterUrl = $url;
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
