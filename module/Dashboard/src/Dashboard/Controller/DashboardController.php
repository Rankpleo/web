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

	public function mapAction()
	{
		return new ViewModel();
	}

	public function commentsAction()
	{
		return new ViewModel();
	}

	public function rankingAction()
	{
		return new ViewModel();
	}

	public function privacidadAction()
	{
		return new ViewModel();
	}

	public function condicionesAction()
	{
		return new ViewModel();
	}

	public function contacto()
	{
		return new ViewModel();
	}

	public function acercade()
	{
		return new ViewModel();
	}
}
