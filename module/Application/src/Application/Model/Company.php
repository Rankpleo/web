<?php

namespace Application\Model;

class Company
{
    public $idCompany;
    public $Name;
    public $overallRating;
    public $idGroupTag;

	public function exchangeArray($data)
	{
		$this->idCompany = (!empty($data['idCompany'])) ? $data['idCompany'] : null;
        $this->Name = (!empty($data['Name'])) ? $data['Name'] : null;
        $this->overallRating = (!empty($data['overallRating'])) ? $data['overallRating'] : null;
        $this->idGroupTag = (!empty($data['idGroupTag'])) ? $data['idGroupTag'] : null;
	}
}