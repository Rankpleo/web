<?php

namespace Application\Model;

class Aspect
{
    public $idAspect;
    public $description;

	public function exchangeArray($data)
	{
		$this->idAspect = (!empty($data['idAspect'])) ? $data['idAspect'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
	}
}