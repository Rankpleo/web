<?php

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Login\Model\Login;
use Login\Model\Register;

use Login\Form\LoginForm;
use Login\Form\RegisterForm;

use Zend\Session\Container;

use \Exception;

class LoginController extends AbstractActionController
{
	public function indexAction()
	{
		$form = new LoginForm();

		$request = $this->getRequest();
		
		if ($request->isPost())
		{
			$post = $request->getPost();

			$login = new Login();

			$form->setInputFilter($login->getInputFilter());
			$form->setData($post);

			if ($form->isValid())
			{
				try
				{

				}
				catch(\Exception $ex)
				{

				}
			}
		}

		return array('form' => $form);
	}
    
    public function registerAction()
    {
        $form = new RegisterForm();

		$request = $this->getRequest();
		
		if ($request->isPost())
		{
			$post = $request->getPost();

			$register = new Register();

			$form->setInputFilter($register->getInputFilter());
			$form->setData($post);

			if ($form->isValid())
			{
				try
				{

				}
				catch(\Exception $ex)
				{

				}
			}
		}

		return array('form' => $form);
    }
}
