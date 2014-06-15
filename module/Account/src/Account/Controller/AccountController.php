<?php

namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use \Exception;

class AccountController extends AbstractActionController
{
    protected $groupTagTable;
    
	public function indexAction()
	{
		return new ViewModel(array(
            'tags' => $this->getGroupTagTable()->fetchAll()
        ));
	}
    
    public function getGroupTagTable()
    {
        if (!$this->groupTagTable) {
            $sm = $this->getServiceLocator();
            $this->groupTagTable = $sm->get('Application\Model\GroupTagTable');
        }
        return $this->groupTagTable;
    }
}
