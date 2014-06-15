<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class GroupTagTable
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
    
     public function getGroupTag($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idGroupTag' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveGroupTag(GroupTag $object)
     {
         $data = array(
             'idGroupTag' => $object->idGroupTag,
         );

         $id = (int) $object->idGroupTag;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getGroupTag($id)) {
                 $this->tableGateway->update($data, array('idGroupTag' => $id));
             } else {
                 throw new \Exception('GroupTag id does not exist');
             }
         }
     }

     public function deleteGroupTag($id)
     {
         $this->tableGateway->delete(array('idGroupTag' => (int) $id));
     }
}