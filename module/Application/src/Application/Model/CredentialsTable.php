<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class CredentialsTable
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
    
     public function getCredentials($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idCredentials' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveCredentials(Credentials $object)
     {
         $data = array(
             'idCredentials' => $object->idCredentials,
             'Password'  => $object->Password,
             'Token'  => $object->Token,
         );

         $id = (int) $object->idCredentials;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCredentials($id)) {
                 $this->tableGateway->update($data, array('idCredentials' => $id));
             } else {
                 throw new \Exception('Credentials id does not exist');
             }
         }
     }

     public function deleteCredentials($id)
     {
         $this->tableGateway->delete(array('idCredentials' => (int) $id));
     }
}