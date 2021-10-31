<?php

use PHPUnit\Framework\TestCase;
require_once 'src/sessions/Session.php';

class SessionTest extends TestCase
{

    protected function setUp(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
        }
    }

    /** @test */
    public function if_session_start()
    {
        $session = new Session();
        $this->assertFalse($session->isStarted());
    }

    /** @test */
    public function session_can_start()
    {
        $session = new Session();
        $this->assertTrue($session->start());
    }

}