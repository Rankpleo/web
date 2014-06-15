<?php

namespace Application\Model;

class MoreComments
{
    public $idCompany;
    public $Name;
    public $text;

	public function exchangeArray($data)
	{
		$this->idCompany = (!empty($data['idCompany'])) ? $data['idCompany'] : null;
        $this->Name = (!empty($data['Name'])) ? $data['Name'] : null;
        $this->text = (!empty($data['text'])) ? $data['text'] : null;
	}
}