<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ReplyTable
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
    
     public function getReply($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idReply' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveReply(Reply $object)
     {
         $data = array(
             'idReply' => $object->idReply,
             'idReview'  => $object->idReview,
             'idParentReply'  => $object->idParentReply,
             'text'  => $object->text,
         );

         $id = (int) $object->idReply;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getReply($id)) {
                 $this->tableGateway->update($data, array('idReply' => $id));
             } else {
                 throw new \Exception('Reply id does not exist');
             }
         }
     }

     public function deleteReply($id)
     {
         $this->tableGateway->delete(array('idReply' => (int) $id));
     }
}