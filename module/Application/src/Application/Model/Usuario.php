<?php

namespace Application\Model;

class Usuario
{
    public $idAccount;
    public $email;
    public $Name;
    public $LastName;
    public $Password;

	public function exchangeArray($data)
	{
		$this->idAccount = (!empty($data['idAccount'])) ? $data['idAccount'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->Name = (!empty($data['Name'])) ? $data['Name'] : null;
        $this->LastName = (!empty($data['LastName'])) ? $data['LastName'] : null;
        $this->Password = (!empty($data['Password'])) ? $data['Password'] : null;
	}
}