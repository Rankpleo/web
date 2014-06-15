<?php

namespace Application\Model;

class Profile
{
	public $idProfile;
	public $Name;
    public $LastName;
    public $Photo;

	public function exchangeArray($data)
	{
		$this->idProfile = (!empty($data['idProfile'])) ? $data['idProfile'] : null;
		$this->Name = (!empty($data['Name'])) ? $data['Name'] : null;
        $this->LastName = (!empty($data['LastName'])) ? $data['LastName'] : null;
        $this->Photo = (!empty($data['Photo'])) ? $data['Photo'] : null;
	}
}