<?php

namespace App\Presenters;

/**
 * Description of TargetsPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class TargetsPresenter extends SecretPresenter
{
    /** @var \App\Targets\TargetsRepository @inject */
    public $targetsRepository;
    
    public function actionList()
    {
        if($this->getRequest()->getPost('action') === 'create-new') {
            $this->createNew();
            $this->redirect("this");
        }

        $this->template->list = $this->targetsRepository->findAll();
    }
    
    protected function createNew()
    {
        $request = $this->getRequest();
        
        $entity = new \App\Targets\Target();
        $entity->setName($request->getPost('name'));
        $entity->setHost($request->getPost('host'));
        $entity->setActive(1);
        
        $this->targetsRepository->insert($entity);
    }
    
    public function actionActivate($id)
    {
        $this->targetsRepository->getTable()
                ->where('id = ? AND deleted = 0', $id)
                ->update(['active' => 1]);

        $this->redirect('list');
    }
    
    public function actionDeactivate($id)
    {
        $this->targetsRepository->getTable()
                ->where('id = ? AND deleted = 0', $id)
                ->update(['active' => 0]);
        
        $this->redirect('list');
    }
    
    public function actionDelete($id)
    {
        $this->targetsRepository->getTable()
                ->where('id = ?', $id)
                ->update([
                    'deleted' => 1,
                    'active' => 0,
                ]);
        
        $this->redirect('list');
    }
}
