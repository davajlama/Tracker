<?php

namespace App\Auth;

/**
 * Description of Authenticator
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class Authenticator implements \Nette\Security\IAuthenticator
{
    /** @var \App\Auth\UsersRepository */
    private $usersRepository;
    
    public function __construct(\App\Auth\UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    
    public function authenticate(array $credentials)
    {
        list($login, $pass) = $credentials;
        
        $account = $this->usersRepository->getByUsername($login);
        if($account) {
            if(\Nette\Security\Passwords::verify($pass, $account->password)) {
                return new \Nette\Security\Identity($account->id);
            }
        }
    }
    
}
