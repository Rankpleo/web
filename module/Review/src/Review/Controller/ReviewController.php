<?php

namespace Review\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

use Zend\Session\Container;

class ReviewController extends AbstractActionController
{
	public function indexAction()
	{
         $user_session = new Container('user');
        if(!isset( $user_session->idProfile))
        {
            return $this->redirect()->toRoute('login', array('action' => 'index'));
        
}
		return new ViewModel();
	}
}
