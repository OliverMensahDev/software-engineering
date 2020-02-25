<?php
/**
 * App Controller Class
 */
require CLASSES . 'ObjectFactoryService.php';
require CLASSES . 'Views/View.php';

class AppController {
    const USERS_TABLE = 'users';
    public $view;

    /**
     * Initial Controller method
     */
    public function init(){
        //Present the login form
        $config = require 'Config/config.php';
        $model = ObjectFactoryService::getModel('UserModel', $config);
        $form = ObjectFactoryService::getForm($model);
        $this->view = new View();
        if(!$_POST){
            $this->view->set('form', $form);
            $this->view->render('register');
        } else {
            $form->setData($_POST);
            $form->validate();
            if($form->isValid){
                $action = $form->config['name'];
                $this->$action($model, $form->getData());
            }
        }
    }

    public function register($model, $data){
        $model->saveUser($data);
        $this->view->render('thanks');
    }
}