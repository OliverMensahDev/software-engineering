<?php
/**
 * Form All Class
 */
Require 'FormBase.php';

class FormAll extends FormBase
{
    /**
     * @param $model
     * @param array $params
     */
    public function __construct($model, $params)
    {
        parent::__construct($model, $params);

        //Add a hidden token for CSRF protection
        $token = md5(time());
        //$session = Session::getInstance();
        //$session->save(['token' => $token]);
        $this->addField([
            'name' => 'token',
            'type' => 'hidden',
            'value' => $token,
            'priority' => 99,
            'validator' => 'match',
        ]);


        //Add a submit button
        $this->addField([
            'name' => 'submit',
            'type' => 'submit',
            'priority' => 100,
            'value' => 'Submit',
        ]);
    }
}