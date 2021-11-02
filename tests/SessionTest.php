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

    /** @test */
    public function can_session_has_items()
    {
        $key1 = 1;
        $key2 = 2;
        
        $session = new Session();
        $session->start();

        $session->set('cart.items', [
            $key1 => ['quantity'=>5, 'price'=>50],
            $key2 => ['quantity'=>13, 'price'=>60],
        ]);
        
        $this->assertArrayHasKeys($_SESSION['cart.items'], [$key2, $key1]);
    }

    // custom method to test multiple keys
    public function assertArrayHasKeys(array $array, array $keys)
    {
        $diff = array_diff($keys, array_keys($array));
        $this->assertTrue(!$diff, 'This array dose not contains the following keys '.
            implode(', ', $diff));
    }

}