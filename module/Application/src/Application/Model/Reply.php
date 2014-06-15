<?php

namespace Application\Model;

class Reply
{
    public $idReply;
    public $idReview;
    public $idParentReply;
    public $text;

	public function exchangeArray($data)
	{
		$this->idReply = (!empty($data['idReply'])) ? $data['idReply'] : null;
        $this->idReview = (!empty($data['idReview'])) ? $data['idReview'] : null;
        $this->idParentReply = (!empty($data['idParentReply'])) ? $data['idParentReply'] : null;
        $this->text = (!empty($data['text'])) ? $data['text'] : null;
	}
}