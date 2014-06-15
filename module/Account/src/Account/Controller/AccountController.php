<?php

namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

class AccountController extends AbstractActionController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}
