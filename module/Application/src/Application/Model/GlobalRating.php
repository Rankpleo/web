<?php

namespace Application\Model;

class GlobalRating
{
    public $idCompany;
    public $idAspect;
    public $description;
    public $Rating;

	public function exchangeArray($data)
	{
		$this->idCompany = (!empty($data['idCompany'])) ? $data['idCompany'] : null;
        $this->idAspect = (!empty($data['idAspect'])) ? $data['idAspect'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->Rating = (!empty($data['Rating'])) ? $data['Rating'] : null;
	}
}