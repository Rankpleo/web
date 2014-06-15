<?php

namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

class DashboardController extends AbstractActionController
{
    protected $globalRatingTable;
    
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
