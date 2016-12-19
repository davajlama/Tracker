<?php

$container = require __DIR__ . '/../app/bootstrap.php';

$container->getByType(Kdyby\Console\Application::class)
	->run();