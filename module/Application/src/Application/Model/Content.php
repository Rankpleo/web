<?php

namespace Application\Model;

class Content
{
    public $idContent;
    public $text;
    public $idProfile;
    public $isAnonimous;
    public $votesUp;
    public $votesDown;

	public function exchangeArray($data)
	{
		$this->idContent = (!empty($data['v'])) ? $data['idContent'] : null;
        $this->text = (!empty($data['v'])) ? $data['text'] : null;
        $this->idProfile = (!empty($data['v'])) ? $data['idProfile'] : null;
        $this->isAnonimous = (!empty($data['v'])) ? $data['isAnonimous'] : null;
        $this->votesUp = (!empty($data['v'])) ? $data['votesUp'] : null;
        $this->votesDown = (!empty($data['v'])) ? $data['votesDown'] : null;
	}
}