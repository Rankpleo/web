<?php

namespace Application\Model;

class Rating
{
    public $idRating;
    public $valueAssigned;
    public $idReview;

	public function exchangeArray($data)
	{
		$this->idRating = (!empty($data['idRating'])) ? $data['idRating'] : null;
        $this->valueAssigned = (!empty($data['valueAssigned'])) ? $data['valueAssigned'] : null;
        $this->idReview = (!empty($data['idReview'])) ? $data['idReview'] : null;
	}
}