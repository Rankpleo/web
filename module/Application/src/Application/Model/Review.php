<?php

namespace Application\Model;

class Review
{
    public $idReview;
    public $idCompany;
    public $workedFrom;
    public $workedUntil;
    public $isCurrentJob;
    public $overallRating;
    public $idGrouptag;
    public $idProfile;

	public function exchangeArray($data)
	{
		$this->idReview = (!empty($data['idReview'])) ? $data['idReview'] : null;
        $this->idCompany = (!empty($data['idCompany'])) ? $data['idCompany'] : null;
        $this->workedFrom = (!empty($data['workedFrom'])) ? $data['workedFrom'] : null;
        $this->workedUntil = (!empty($data['workedUntil'])) ? $data['workedUntil'] : null;
        $this->isCurrentJob = (!empty($data['isCurrentJob'])) ? $data['isCurrentJob'] : null;
        $this->overallRating = (!empty($data['overallRating'])) ? $data['overallRating'] : null;
        $this->idGrouptag = (!empty($data['idGrouptag'])) ? $data['idGrouptag'] : null;
        $this->idProfile = (!empty($data['idProfile'])) ? $data['idProfile'] : null;
	}
}