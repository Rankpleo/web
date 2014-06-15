<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ReviewTable
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
    
     public function getReview($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('idReview' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
    
     public function saveReview(Review $object)
     {
         $data = array(
             'idReview' => $object->idReview,
             'idCompany'  => $object->idCompany,
             'workedFrom'  => $object->workedFrom,
             'workedUntil'  => $object->workedUntil,
             'isCurrentJob'  => $object->isCurrentJob,
             'overallRating'  => $object->overallRating,
             'idGrouptag'  => $object->idGrouptag,
             'idProfile'  => $object->idProfile,
         );

         $id = (int) $object->idReview;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getReview($id)) {
                 $this->tableGateway->update($data, array('idReview' => $id));
             } else {
                 throw new \Exception('Review id does not exist');
             }
         }
     }

     public function deleteReview($id)
     {
         $this->tableGateway->delete(array('idReview' => (int) $id));
     }
}