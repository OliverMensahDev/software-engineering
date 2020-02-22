<?php
namespace core\resources;

use App\Helpers\ActionClass;

class Email
{
    public function send($to, $template_name, $dataAttr)
    {
        $actionClass = new ActionClass();
        return $actionClass->execute('ElasticEmail', 'send', ['mailer', $to, $template_name, $dataAttr]);
    }
}
