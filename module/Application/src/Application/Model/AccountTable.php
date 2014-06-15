<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class AccountTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
    
     public function getAccount($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idAccount' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveAccount(Account $object)
     {
         $data = array(
             'idAccount' => $object->idAccount,
             'email'  => $object->email,
             'idProfile'  => $object->idProfile,
         );

         $id = (int) $object->idAccount;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAccount($id)) {
                 $this->tableGateway->update($data, array('idAccount' => $id));
             } else {
                 throw new \Exception('Account id does not exist');
             }
         }
     }

     public function deleteAccount($id)
     {
         $this->tableGateway->delete(array('idAccount' => (int) $id));
     }
}