<?php

namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

class DashboardController extends AbstractActionController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}
