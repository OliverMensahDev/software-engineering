<?php
/**
 * App Controller Class
 */
require CLASSES . 'ObjectFactoryService.php';
require CLASSES . 'Form/Form.php';
require CLASSES . 'View/View.php';

final class AppController {
    const USERS_TABLE = 'users';
    public $view;
    private static $instance = null;
    private $calledOnce;

    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new AppController();
      }
     
      return self::$instance;
    }

    private function __construct(){
        $this->calledOnce = false;
    }

    /**
     * Initial Controller method
     */
    public function init(){
        if(!$this->calledOnce){
            //Present the login form
            $config = require 'Config/config.php';
            $pdo = ObjectFactoryService::getDb($config);
            $model = ObjectFactoryService::getModel($pdo);
            $form = new Form($model, $config['forms']['register']);
            $form->generateFields();
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
        $this->calledOnce = true;
    }

    public function register($model, $data){
        $model->saveUser($data);
        $this->view->render('thanks');
    }
}