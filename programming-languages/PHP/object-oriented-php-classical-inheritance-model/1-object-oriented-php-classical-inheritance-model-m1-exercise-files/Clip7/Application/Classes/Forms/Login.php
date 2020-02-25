<?php
/**
 * Login Form
 */
require 'Form.php';

class Login extends Form{

    /**
     * @param $model
     * @param array $params
     */
    public function __construct($model){
        $params = [
            'name' => 'login',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($model, $params);

        //Add a username field
        $this->addField([
            'username' => [
                'type' => 'text',
                'name' => 'username',
                'priority' => 1,
                'required' => true,
                'value' => '',
            ],
        ]);

        //Add a password field
        $this->addField([
            'password' => [
                'type' => 'password',
                'name' => 'password',
                'priority' => 2,
                'required' => true,
                'value' => '',
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