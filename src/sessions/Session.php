<?php

require_once 'src/sessions/SessionInterface.php';

class Session implements SessionInterface
{

    // check if session started
    private $is_started = false;

    public function isStarted() : bool
    {
        $this->is_started = session_status() === PHP_SESSION_ACTIVE;
        return $this->is_started;
    }

    // start session
    public function start() : bool
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

    public function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    public function get(string $key, $default = null) : mixed
    {
        return $this->has($key) ? $_SESSION[$key] : $default;
    }

    public function clear() : void
    {
        $_SESSION = [];
    }

    public function remove(string $key) : void
    {
        if($this->has($key)){
            unset($_SESSION[$key]);
        }
    }

    public function set(string $key, mixed $value) : void
    {
        $_SESSION[$key] = $value;
    }
}