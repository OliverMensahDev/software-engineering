<?php
/**
 * Register Form
 */
Require 'Form.php';

class Register extends Form
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
            'first_name' => [
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
            ]
        ]);

        //Add last name
        $this->addField([
            'last_name' => [
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
            ],
        ]);

        //Add email
        $this->addField([
            'email' => [
                'label' => 'Email',
                'type' => 'text',
                'name' => 'email',
                'priority' => 3,
                'required' => true,
                'value' => '',
                'validator' => 'email',
            ],
        ]);

        //Add email preferred contact
        $this->addField([
            'emailPreferredContact' => [
                'label' => 'Contact By Email',
                'type' => 'checkbox',
                'name' => 'email_preferred_contact',
                'priority' => 4,
                'required' => true,
                'value' => false,
                'validator' => 'boolean',
            ],
        ]);

        //Add country
        $this->addField([
            'country' => [
                'label' => 'Country',
                'type' => 'select',
                'name' => 'country',
                'multiple' => false,
                'priority' => 5,
                'required' => true,
                'value' => '',
                'options' => 'country',
                'validator' => 'InArray',
            ],
        ]);

        //Add a submit button
        $this->addField([
            'submit' => [
                'type' => 'submit',
                'priority' => 6,
                'value' => 'Submit',
            ],
        ]);
    }
}