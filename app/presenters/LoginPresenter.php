<?php

namespace App\Presenters;

/**
 * Description of LoginPresenter
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class LoginPresenter extends \Nette\Application\UI\Presenter
{
    
    public function actionLogin()
    {
        if($this->getRequest()->isMethod('POST')) {
            $username = $this->getRequest()->getPost('username');
            $password = $this->getRequest()->getPost('password');
            
            try {
                $this->getUser()->login($username, $password);
                $this->redirect('Homepage:index');
            } catch(AuthenticationException $e) {
                $this->flashMessage('Bad credentials');
            }
        }
    }
    
    public function actionLogout()
    {
        $this->getUser()->logout();
        $this->redirect('login');
    }
    
}
