<?php

namespace SON\Init;

/**
 * Classe de Inicialização do Sistema
 * Identifica e configura a rota informada pelo usuario
 */
abstract class Bootstrap
{
	/**
	 * Arquivo de rotas do sistema
	 * @var array
	 */
	private $routes;

	public function __construct()
	{
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	/**
	 * Classe abstrata para iniciar as rotas do sistema
	 * 
	 * @return array Rotas do sistema
	 */
	abstract protected function initRoutes();

	/**
	 * Roda a aplicação conforme as rotas informadas
	 * Obtem na rota o controller e o metodo
	 * Atraves dessas informacoes instacia a classe
	 * E chama o metodo informado na rota
	 * 
	 * @param  url $url URL atual que o usuario informou
	 */
	protected function run($url)
	{
		array_walk($this->routes, function($route) use ($url){
			if ($url == $route['route']) {
				$class = "App\\Controllers\\".ucfirst($route['controller']);
				$controller = new $class;
				$action = $route['action'];
				$controller->$action();
			}
		});
	}

	/**
	 * Atribui o array de rotas para a variavel routes
	 * 
	 * @param array $routes	Arquivo de rotas configurado pelo programador
	 */
	protected function setRoutes(array $routes)
	{
		$this->routes = $routes;
	}

	/**
	 * Obtem a URL atual do usuario visitante
	 * 
	 * @return url URL atual do usuario
	 */
	protected function getUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);		
	}
}