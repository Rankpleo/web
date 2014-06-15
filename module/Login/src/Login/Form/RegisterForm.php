<?php

namespace Login\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('frmRegister');

        $this->add(array(
			'name' => 'txtName',
			'type' => 'Text',
			'options' => array(
				'label' => 'Nombre(s):',
			),
			'attributes' => array(
				//'placeholder' => 'Nombre(s)',
				'id' => 'txtEmail',
				'class' => 'form-control',
				'required' => 'required',
			),
		));
        
        $this->add(array(
			'name' => 'txtPaterno',
			'type' => 'Text',
			'options' => array(
				'label' => 'Apellidos:',
			),
			'attributes' => array(
				//'placeholder' => 'Apellidos',
				'id' => 'txtPaterno',
				'class' => 'form-control',
				'required' => 'required',
			),
		));
        
		$this->add(array(
			'name' => 'txtEmail',
			'type' => 'Text',
			'options' => array(
				'label' => 'Correo electrónico:',
			),
			'attributes' => array(
				//'placeholder' => 'Correo electrónico',
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
				//'placeholder' => 'Contraseña',
				'id' => 'txtPass',
				'class' => 'form-control',
				'required' => 'required',
			),
		));
        
        $this->add(array(
			'name' => 'txtConfirmPass',
			'type' => 'Password',
			'options' => array(
				'label' => 'Confirmar Contraseña:',
			),
			'attributes' => array(
				//'placeholder' => 'Confirmar Contraseña',
				'id' => 'txtConfirmPass',
				'class' => 'form-control',
				'required' => 'required',
			),
		));
	}
}