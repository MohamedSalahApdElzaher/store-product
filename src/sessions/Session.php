<?php

class Session
{

    // check if session started
    private $is_started = false;

    public function isStarted(){
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

}