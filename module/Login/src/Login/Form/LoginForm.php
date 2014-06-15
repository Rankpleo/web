<?php

namespace Login\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('frmLogin');

		$this->add(array(
			'name' => 'txtEmail',
			'type' => 'Text',
			'options' => array(
				'label' => 'Correo Electrónico:',
			),
			'attributes' => array(
				'placeholder' => 'Correo Electrónico',
				'id' => 'txtEmail',
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