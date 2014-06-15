<?php

namespace Application\Model;

class GroupTag
{
    public $idGroupTag;

	public function exchangeArray($data)
	{
		$this->idGroupTag = (!empty($data['idGroupTag'])) ? $data['idGroupTag'] : null;
	}
}