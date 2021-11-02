<?php

require_once 'src/sessions/SessionInterface.php';

class Session implements SessionInterface
{

    // check if session started
    private $is_started = false;

    public function isStarted(){
        $this->is_started = session_status() === PHP_SESSION_ACTIVE;
        return $this->is_started;
    }

    // start session
    public function start()
    {
        // if session running
        if($this->is_started) return true;
        // is session is active
        if(session_status() === PHP_SESSION_ACTIVE){
            $this->is_started=true;
            return true;
        }
        // start session
        session_start();
        $this->is_started=true;
        return true;
    }

    public function has(string $key)
    {
        // TODO: Implement has() method.
    }

    public function get(string $key)
    {
        // TODO: Implement get() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function remove(string $key)
    {
        // TODO: Implement remove() method.
    }

    public function set(string $key, mixed $value)
    {
        $_SESSION[$key] = $value;
    }
}