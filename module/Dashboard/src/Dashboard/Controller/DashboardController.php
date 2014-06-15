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

		return new ViewModel(array(
            'resultado' => $this->getGlobalRatingTable()->fetchAll()
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
