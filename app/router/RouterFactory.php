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
        $router[] = new Route('/tracker.js', 'Script:master');
        $router[] = new Route('/logger/log', 'Logger:log');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:index');
		return $router;
	}

}
