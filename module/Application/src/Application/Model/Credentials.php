<?php

namespace Application\Model;

class Credentials
{
    public $idCredentials;
    public $Password;
    public $Token;

	public function exchangeArray($data)
	{
		$this->idCredentials = (!empty($data['idCredentials'])) ? $data['idCredentials'] : null;
        $this->Password = (!empty($data['Password'])) ? $data['Password'] : null;
        $this->Token = (!empty($data['Token'])) ? $data['Token'] : null;
	}
}