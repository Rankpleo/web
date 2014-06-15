<?php

namespace Login\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Login
{
	protected $inputFilter;

	private function getMessage($tipo, $cantidad = 0)
	{
		$messages = array();
		$messages["TOO_SHORT"] = "Este campo debe de tener al menos ".$cantidad." caracter.";
		$messages["TOO_LONG"] = "Este campo debe de tener maximo ".$cantidad." caracteres.";
		$messages["IS_EMPTY"] = "Este campo es obligatorio.";
		$messages["STRING_EMPTY"] = "Este campo solo debe contener digitos.";
		$messages["NOT_DIGITS"] = "Este campo solo debe contener digitos.";

		return $messages[$tipo];
	}
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}

	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();

			$inputFilter->add(array(
				'name'     => 'txtUser',
				'required' => true,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'options' => array(
							'messages' => array( 
								\Zend\Validator\NotEmpty::IS_EMPTY => $this->getMessage("IS_EMPTY"),
							),
						),
					),
				),
			));

			$inputFilter->add(array(
				'name'     => 'txtPass',
				'required' => true,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'options' => array(
							'messages' => array( 
								\Zend\Validator\NotEmpty::IS_EMPTY => $this->getMessage("IS_EMPTY"),
							),
						),
					),
				),
			));

			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
}