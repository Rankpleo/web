<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class RatingTable
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
    
     public function getRating($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idRating' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveRating(Rating $object)
     {
         $data = array(
             'idRating' => $object->idRating,
             'valueAssigned'  => $object->valueAssigned,
             'idReview'  => $object->idReview,
         );

         $id = (int) $object->idRating;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getRating($id)) {
                 $this->tableGateway->update($data, array('idRating' => $id));
             } else {
                 throw new \Exception('Rating id does not exist');
             }
         }
     }

     public function deleteRating($id)
     {
         $this->tableGateway->delete(array('idRating' => (int) $id));
     }
}