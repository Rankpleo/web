<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Expression;

class UsuarioTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

     public function getUsuario($id)
     {
        $id  = (int) $id;
        $select = new Select();
        $select->from("Account");
        $select->columns(array('email'));
        $select->join('Profile', 'Account.idProfile = Profile.idProfile', array('idProfile', 'Name', 'LastName'));
        $select->join('Credentials', 'Account.idAccount = Credentials.idAccount');
        $select->where(array('Account.idAccount' => $id));

		// echo $select->getSqlString();

		$resultSet = $this->tableGateway->selectWith($select);

		$row = $resultSet->current();

		if (!$row) {
			$row = null;
		}

		return $row;
     }
    
    public function fetchLogin($user, $pass)
	{
		$select = new Select();
		$select->from("Account");
		$select->columns(array('email'));
        $select->join('Profile', 'Account.idProfile = Profile.idProfile', array('idProfile', 'Name', 'LastName'));
        $select->join('Credentials', 'Account.idAccount = Credentials.idAccount');
		$select->where(array('Account.email' => $user, 'Credentials.Password' => $pass));

		// echo $select->getSqlString();

		$resultSet = $this->tableGateway->selectWith($select);

		$row = $resultSet->current();

		if (!$row) {
			$row = null;
		}

		return $row;
	}	
    
     public function saveUsuario(Usuario $object)
     {
         $connection = $this->tableGateway->getAdapter()->getDriver()->getConnection();
         $result = $connection->execute("call save_user('".$object->Name."', '".$object->LastName."', '".$object->Password."', '".$object->email."')");
         $statement = $result->getResource();
     }
}