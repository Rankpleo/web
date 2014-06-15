<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class AspectTable
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
    
     public function getAspect($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idAspect' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveAspect(Aspect $object)
     {
         $data = array(
             'idAspect' => $object->idAspect,
             'description'  => $object->description,
         );

         $id = (int) $object->idAspect;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAspect($id)) {
                 $this->tableGateway->update($data, array('idAspect' => $id));
             } else {
                 throw new \Exception('Aspect id does not exist');
             }
         }
     }

     public function deleteAspect($id)
     {
         $this->tableGateway->delete(array('idAspect' => (int) $id));
     }
}