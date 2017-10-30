<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action
{
	public function index()
	{
		$client = Container::getModel('Client');
		$this->view->clients = $client->fetchAll();
		$this->render('index');
	}

	public function contact()
	{
		$client = Container::getModel('Client');
		$this->view->clients = $client->find(1);
		$this->render('contact');
	}

}
