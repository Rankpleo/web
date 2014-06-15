<?php

namespace Review\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

class ReviewController extends AbstractActionController
{
	public function indexAction()
	{
		return new ViewModel();
	}
}
