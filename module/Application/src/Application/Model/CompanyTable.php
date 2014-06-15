<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class CompanyTable
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
    
     public function getCompany($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idCompany' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveCompany(Company $object)
     {
         $data = array(
             'idCompany' => $object->idCompany,
             'Name'  => $object->Name,
             'overallRating'  => $object->overallRating,
             'idGroupTag'  => $object->idGroupTag,
         );

         $id = (int) $object->idCompany;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCompany($id)) {
                 $this->tableGateway->update($data, array('idCompany' => $id));
             } else {
                 throw new \Exception('Company id does not exist');
             }
         }
     }

     public function deleteCompany($id)
     {
         $this->tableGateway->delete(array('idCompany' => (int) $id));
     }
}