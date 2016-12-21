<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
        
        // public area
        $router[] = new Route('/tracker.js', 'Script:master');
        $router[] = new Route('/login', 'Login:login');
        $router[] = new Route('/logger/log', 'Logger:log');
        
        // private area
        $router[] = new Route('/test', 'Test:test');
        $router[] = new Route('/login', 'Login:login');
        $router[] = new Route('/messages', 'Messages:list');
        $router[] = new Route('/targets', 'Targets:list');
        $router[] = new Route('/targets/delete/<id>', 'Targets:delete');
        $router[] = new Route('/', 'Homepage:index', Route::ONE_WAY);
		//$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:index');
		return $router;
	}

}
