<?php

namespace App\Auth;

/**
 * Description of UsersRepository
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class UsersRepository extends \App\BaseRepository
{
    
    public function getByUsername($username)
    {
        return $this->getTable()->where('username = ?', $username)->fetch();
    }
  
    public function getTable()
    {
        return $this->getAdapter()->table('users');
    }
}
