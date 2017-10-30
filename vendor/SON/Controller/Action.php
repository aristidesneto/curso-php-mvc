<?php

namespace SON\Controller;

abstract class Action
{
    protected $view;
    private $action;

	public function __construct()
	{
		$this->view = new \stdClass;
	}

	/**
	 * Metodo para renderizar a view
	 * Obtem o nome da classe atual
	 * Pega apenas o nome do diretorio onde esta a view usando o str_replace
	 * Realiza o include no arquivo
	 * 
	 * @param  string $action Nome da view para renderizar
	 */
	
	/**
	 * Metodo para rendericar a view
	 * @param  string  $action Nome da view
	 * @param  boolean $layout Utilizar true ou false caso queira utilzar o layout html
	 */
	protected function render($action, $layout = true)
	{
		$this->action = $action;
		if ($layout == true && file_exists("../App/Views/layout.phtml")) {
			include_once "../App/Views/layout.phtml";
		} else {
			$this->content();
		}
	}

	/**
	 * Obtem o nome da classe atual
	 * Pega apenas o nome do diretorio onde esta a view usando o str_replace
	 * Realiza o include no arquivo
	 */
	protected function content()
	{
		$current = get_class($this);
		$singleClassName = strtolower((str_replace("Controller", "", str_replace("App\\Controllers\\", "", $current))));
		include_once "../App/Views/" . $singleClassName . "/" . $this->action . ".phtml";
	}
}