<?php

namespace Login\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('frmLogin');

		$this->add(array(
			'name' => 'txtUser',
			'type' => 'Text',
			'options' => array(
				'label' => 'Usuario:',
			),
			'attributes' => array(
				'placeholder' => 'Usuario',
				'id' => 'txtUser',
				'class' => 'form-control',
				'required' => 'required',
			),
		));

		$this->add(array(
			'name' => 'txtPass',
			'type' => 'Password',
			'options' => array(
				'label' => 'Contraseña:',
			),
			'attributes' => array(
				'placeholder' => 'Contraseña',
				'id' => 'txtPass',
				'class' => 'form-control',
				'required' => 'required',
			),
		));
	}
}