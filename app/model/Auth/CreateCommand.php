<?php

namespace App\Auth;

/**
 * Description of CreateCommand
 *
 * @author David Bittner <david.bittner@seznam.cz>
 */
class CreateCommand extends \Symfony\Component\Console\Command\Command
{

    protected function configure()
    {
        $this->setName('user:create')
                ->addArgument('username', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Username')
                ->addArgument('password', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Password')
                ->setDescription('Create an user');
    }
    
    public function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        
        /* @var $repo \App\Auth\UsersRepository */
        $repo = $this->getHelper('container')->getByType(UsersRepository::class);
        
        $user = $repo->getByUsername($username);
        
        if($user) {
            $output->writeln("<error>Username [$username] is already exists</error>");
            return;
        }
        
        $repo->getTable()->insert([
            'username' => $username,
            'password' => \Nette\Security\Passwords::hash($password),
        ]);
        
        $output->writeln("User [$username] was created");
    }
    
}
