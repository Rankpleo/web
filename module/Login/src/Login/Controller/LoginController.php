<?php

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Expression;

use Login\Model\Login;
use Login\Model\Register;
use Application\Model\Usuario;

use Login\Form\LoginForm;
use Login\Form\RegisterForm;

use Zend\Session\Container;

use \Exception;

class LoginController extends AbstractActionController
{
	public function indexAction()
	{
        $user_session = new Container('user');
        $user_session->getManager()->getStorage()->clear('user');

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
                    $sm = $this->getServiceLocator();
			$adapter = $sm->get('Zend\Db\Adapter\Adapter');

			$sql = new Sql($adapter);
                    
                    $select = $sql->select();
                    $select->from("Account");
                    $select->columns(array('email'));
                    $select->join('Profile', 'Account.idProfile = Profile.idProfile', array('idProfile', 'Name', 'LastName'));
                    $select->join('Credentials', 'Account.idAccount = Credentials.idAccount');
                    $select->where(array('Account.email' => $post["txtEmail"], 'Credentials.Password' => $post["txtPass"]));
                    
                    $statement = $sql->prepareStatementForSqlObject($select);
			         $results = $statement->execute();
                    
                    $datos = new ViewModel($results);
                  /*  print_r($datos->getVariables()[0]);*/
                    if(isset($datos->getVariables()[0]["idProfile"]))
                    {
                        $user_session = new Container('user');
				        $user_session->idProfile = $datos->getVariables()[0]["idProfile"];
                    
                        return $this->redirect()->toRoute('dashboard', array('action' => 'index'));
                    }
                        else
                        return array('form' => $form, 'message' => 'Usuario y/o contraseña incorretos');
                    
                   
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
        $user_session = new Container('user');
        $user_session->getManager()->getStorage()->clear('user');
        
        $form = new RegisterForm();
        
        $message = "";

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
                    $connection = null;

                    $sm = $this->getServiceLocator();
                    $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $connection = $adapter->getDriver()->getConnection();
                    
                     $result = $connection->execute("call save_user('".$post["txtName"]."', '".$post["txtPaterno"]."', '".$post["txtPass"]."', '".$post["txtEmail"]."')");
                     $statement = $result->getResource();
                    
                    return $this->redirect()->toRoute('dashboard', array('action' => 'index'));
				}
				catch(\Exception $ex)
				{
                    $message = $ex;
				}
			}
		}

		return array('form' => $form, 'message' => $message);
    }
}
