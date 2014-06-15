<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ProfileTable
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
    
     public function getProfile($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idProfile' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveProfile(Profile $object)
     {
         $data = array(
             'idProfile' => $object->idProfile,
             'Name'  => $object->Name,
             'LastName'  => $object->LastName,
             'Photo'  => $object->Photo,
         );

         $id = (int) $object->idProfile;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getProfile($id)) {
                 $this->tableGateway->update($data, array('idProfile' => $id));
             } else {
                 throw new \Exception('Profile id does not exist');
             }
         }
     }

     public function deleteProfile($id)
     {
         $this->tableGateway->delete(array('idProfile' => (int) $id));
     }
}