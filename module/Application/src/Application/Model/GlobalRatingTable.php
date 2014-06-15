<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class GlobalRatingTable
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
    
     public function getGlobalRating($id)
     {
         $id  = (int) $id;
         $resultSet = $this->tableGateway->select(array('$idCompany' => $id));
         return $resultSet;
     }
}