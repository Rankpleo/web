<?php

namespace Login\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Register
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
				'name'     => 'txtEmail',
				'required' => true,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 80,
                            'messages' => array( 
                                \Zend\Validator\StringLength::TOO_SHORT => $this->getMessage("TOO_SHORT", 1),
                                \Zend\Validator\StringLength::TOO_LONG => $this->getMessage("TOO_LONG", 80),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array( 
                                \Zend\Validator\NotEmpty::IS_EMPTY => $this->getMessage("IS_EMPTY"),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            // 'messages' => array( 
                            // 	\Zend\Validator\EmailAddress::INVALID => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::INVALID_FORMAT => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::INVALID_HOSTNAME => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::INVALID_MX_RECORD => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::INVALID_SEGMENT => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::DOT_ATOM => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::QUOTED_STRING => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::INVALID_LOCAL_PART => $this->getMessage("IS_EMPTY"),
                            // 	\Zend\Validator\EmailAddress::LENGTH_EXCEEDED => $this->getMessage("IS_EMPTY"),
                            // ),
                        ),
                    ),
				),
			));

			$inputFilter->add(array(
				'name'     => 'txtName',
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
				'name'     => 'txtPaterno',
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
            
            $inputFilter->add(array(
				'name'     => 'txtConfirmPass',
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