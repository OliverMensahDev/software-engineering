<?php
/**
 * Form Common Class
 */
Require 'FormBase.php';

class FormCommon extends FormBase
{
    /**
     * @param $model
     * @param array $params
     */
    public function __construct($models, $params)
    {
        parent::__construct($models, $params);

        //Add a hidden token for CSRF protection
        $token = md5(time());
        $this->addField([
            'name' => 'token',
            'type' => 'hidden',
            'value' => $token,
            'priority' => 99,
            'validator' => 'token',
        ]);

        //Add a submit button
        $this->addField([
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'Submit',
            'priority' => 100,
        ]);
    }
}