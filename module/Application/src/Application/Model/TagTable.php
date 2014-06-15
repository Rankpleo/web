<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class TagTable
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
    
     public function getTag($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idTag' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveTag(Tag $object)
     {
         $data = array(
             'idTag' => $object->idTag,
             'idGrouptag'  => $object->idGrouptag,
             'text'  => $object->text,
         );

         $id = (int) $object->idTag;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getTag($id)) {
                 $this->tableGateway->update($data, array('idTag' => $id));
             } else {
                 throw new \Exception('Tag id does not exist');
             }
         }
     }

     public function deleteTag($id)
     {
         $this->tableGateway->delete(array('idTag' => (int) $id));
     }
}