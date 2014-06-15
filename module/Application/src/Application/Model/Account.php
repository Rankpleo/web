<?php

namespace Application\Model;

class Account
{
    public $idAccount;
    public $email;
    public $idProfile;

	public function exchangeArray($data)
	{
		$this->idAccount = (!empty($data['idAccount'])) ? $data['idAccount'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->idProfile = (!empty($data['idProfile'])) ? $data['idProfile'] : null;
	}
}