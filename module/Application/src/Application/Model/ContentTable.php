<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ContentTable
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
    
     public function getContent($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idContent' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveContent(Content $object)
     {
         $data = array(
             'idContent' => $object->idContent,
             'text'  => $object->text,
             'idProfile'  => $object->idProfile,
             'isAnonimous'  => $object->isAnonimous,
             'votesUp'  => $object->votesUp,
             'votesDown'  => $object->votesDown,
         );

         $id = (int) $object->idContent;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getContent($id)) {
                 $this->tableGateway->update($data, array('idContent' => $id));
             } else {
                 throw new \Exception('Content id does not exist');
             }
         }
     }

     public function deleteContent($id)
     {
         $this->tableGateway->delete(array('idContent' => (int) $id));
     }
}