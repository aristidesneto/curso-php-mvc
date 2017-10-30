<?php

namespace App;

use SON\Init\Bootstrap;

/**
 * Classe de configuração de rotas
 * Extend da classe Bootstrap
 */
class Route extends Bootstrap
{
	protected function initRoutes()
	{
		$routes['home'] = [
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index',
		];
		$routes['contact'] = [
			'route' => '/contact',
			'controller' => 'indexController',
			'action' => 'contact',
		];

		$this->setRoutes($routes);
	}

}