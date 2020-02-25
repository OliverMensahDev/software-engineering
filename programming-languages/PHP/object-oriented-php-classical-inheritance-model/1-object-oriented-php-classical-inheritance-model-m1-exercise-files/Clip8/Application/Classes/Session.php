<?php
/**
 * Session Class
 */
class Session
{
    public $session;
    public static $instance;

    public function save(array $data = null)
    {
        foreach ($data as $key => $value) {
            $this->session[$key] = $value;
        }
    }

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self();
            self::$instance->start();
        }
        return self::$instance;
    }

    protected function start()
    {
        session_start();
        $this->session = &$_SESSION;
    }

    public function get($key = null)
    {
        if (!$this->session && !$key) return false;
        return $this->session[$key];
    }

    public function destroy()
    {
        unset($this->session);
    }
}