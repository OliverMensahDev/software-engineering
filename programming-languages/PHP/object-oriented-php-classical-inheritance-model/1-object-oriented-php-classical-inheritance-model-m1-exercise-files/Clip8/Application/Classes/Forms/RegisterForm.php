<?php
/**
 * Register Form Class
 */
Require 'FormAll.php';

class RegisterForm extends FormAll
{
    /**
     * @param $model
     * @param array $params
     */
    public function __construct($model)
    {
        $params = [
            'name' => 'register',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($model, $params);

        //Add first name
        $this->addField([
            'label' => 'First Name',
            'type' => 'text',
            'name' => 'first_name',
            'priority' => 1,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 2,
                    'maximum' => 30,
                ],
            ],
        ]);

        //Add last name
        $this->addField([
            'label' => 'Last Name',
            'type' => 'text',
            'name' => 'last_name',
            'priority' => 2,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 2,
                    'maximum' => 30,
                ],
            ],
        ]);

        //Add email
        $this->addField([
            'label' => 'Email',
            'type' => 'text',
            'name' => 'email',
            'priority' => 3,
            'required' => true,
            'value' => '',
            'validator' => 'email',
        ]);

        //Add email preferred contact
        $this->addField([
            'label' => 'Contact By Email',
            'type' => 'checkbox',
            'name' => 'email_preferred_contact',
            'priority' => 4,
            'required' => true,
            'value' => false,
            'validator' => 'boolean',
        ]);

        //Add country
        $this->addField([
            'label' => 'Country',
            'type' => 'select',
            'name' => 'country',
            'multiple' => false,
            'priority' => 5,
            'required' => true,
            'value' => '',
            'options' => 'country',
            'validator' => 'InArray',
        ]);

        //Sort the fields by priority
        ksort($this->fields);
    }
}