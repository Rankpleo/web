<?php

namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

use Zend\Session\Container;

class DashboardController extends AbstractActionController
{
    protected $globalRatingTable;
    
	public function indexAction()
	{
        $user_session = new Container('user');
        if(!isset( $user_session->idProfile))
        {
            return $this->redirect()->toRoute('login', array('action' => 'index'));
        
}
		return new ViewModel();
	}

	public function mapAction()
	{
		return new ViewModel();
	}

	public function commentsAction()
	{
        $user_session = new Container('user');
        if(!isset( $user_session->idProfile))
        {
            return $this->redirect()->toRoute('login', array('action' => 'index'));
        
}
		return new ViewModel();
	}

	public function rankingAction()
	{
        $user_session = new Container('user');
        if(!isset( $user_session->idProfile))
        {
            return $this->redirect()->toRoute('login', array('action' => 'index'));
        
}
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

	public function contactoAction()
	{
		return new ViewModel();
	}

	public function acercadeAction()
	{
		return new ViewModel();
	}

	public function addcompanyAction()
	{
		return new ViewModel();
	}

	public function addpersonAction()
	{
		return new ViewModel();
	}

	public function searchAction()
	{   
		$user_session = new Container('user');
        if(!isset( $user_session->idProfile))
        {
            return $this->redirect()->toRoute('login', array('action' => 'index'));
        }
        
        $request = $this->getRequest();
		
		if ($request->isPost())
		{
			return new ViewModel(array(
            	'resultado' => $this->getGlobalRatingTable()->fetchAll()
        	));
		}
		else
			return new ViewModel(array(
            	'resultado' => array()
        	));
	}
    
    public function getGlobalRatingTable()
    {
        if (!$this->globalRatingTable) {
            $sm = $this->getServiceLocator();
            $this->globalRatingTable = $sm->get('Application\Model\GlobalRatingTable');
        }
        return $this->globalRatingTable;
    }
}
