<?php

namespace Application\Model;

class Tag
{
    public $idTag;
    public $idGrouptag;
    public $text;

	public function exchangeArray($data)
	{
		$this->idTag = (!empty($data['idTag'])) ? $data['idTag'] : null;
        $this->idGrouptag = (!empty($data['idGrouptag'])) ? $data['idGrouptag'] : null;
        $this->text = (!empty($data['text'])) ? $data['text'] : null;
	}
}