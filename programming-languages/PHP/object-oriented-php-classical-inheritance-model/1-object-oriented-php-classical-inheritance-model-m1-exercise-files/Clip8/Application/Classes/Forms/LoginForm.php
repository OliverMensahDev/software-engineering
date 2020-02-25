<?php
/**
 * Login Form Class
 */
require 'FormAll.php';

class LoginForm extends FormAll
{

    /**
     * @param $model
     * @param array $params
     */
    public function __construct($model)
    {
        $params = [
            'name' => 'login',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($model, $params);

        //Add a username field
        $this->addField([
            'type' => 'text',
            'name' => 'username',
            'priority' => 1,
            'required' => true,
            'value' => '',
        ]);

        //Add a password field
        $this->addField([
            'type' => 'password',
            'name' => 'password',
            'priority' => 2,
            'required' => true,
            'value' => '',
        ]);
    }
}