<?php
//A objects factory class

class ObjectFactoryService
{
    public static $pdo;
    public static $session;
    public static $config;
    public static $model;

    /**
     * @param array|null $connectParams
     * @return object $pdo The PDO object
     */
    public static function getDb(array $connectParams = null)
    {
        if (!self::$pdo) {
            try {
                $config = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
                self::$pdo = new PDO($connectParams['db']['dsn'],
                    $connectParams['db']['user'],
                    $connectParams['db']['pass'],
                    $config);
            } catch (PDOException $e) {
                echo 'Failed connection' . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    /**
     *
     */
    public static function getConfig(){
        if (!self::$config){
            self::$config = require 'Config/config.php';
        }
    }

    /**
     * @return Session
     */
    public static function getSession()
    {
        if (!self::$session) {
            self::$session = new Session();
        }
        return self::$session;
    }

    /**
     * Provides model class abstraction
     * @param $model
     * @return object $model The model object
     */
    public static function getModel($model, $config)
    {
        if (!$model && !$config) return false;
        if(!self::$model){
            require CLASSES . 'Models' . DS . "$model.php";
            self::$model = new $model(self::getDb($config));
        }
        return self::$model;
    }

    /**
     * Provides form class abstraction
     * @param $form
     * @param $model
     * @return object $form The form object
     */
    public static function getForm($form, $model)
    {
        if (!$form && !$model) return false;
        if(!class_exists($form)){
            require CLASSES . 'Forms' . DS . "$form.php";
        }
        return new $form($model);
    }
}