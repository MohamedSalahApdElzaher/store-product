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

    /** @test */
    public function is_item_in_array()
    {
        $session = new Session();
        $session->set('auth.item', 'item1');
        $this->assertTrue($session->has('auth.item'));
    }

    /** @test */
    public function retrive_item()
    {
        $session = new Session();
        $session->set('auth.item', 50);
        $this->assertEquals(50, $session->get('auth.item'));
        $this->assertNull($session->get('list.item'));
    }

    /** @test */
    public function remove_session_key()
    {
        $session = new Session();
        $session->set('auth.item', 50);
        $session->remove('auth.item');
        $this->assertNull($session->get('auth.item'));
    }

    /** @test */
    public function clear_all_session()
    {
        $session = new Session();
        $session->set('auth.item', 50);
        $session->set('list.item', 50);
        $session->set('cat.item', 50);
        $session->clear();
        $this->assertEmpty($_SESSION);
    }

    // custom method to test multiple keys
    public function assertArrayHasKeys(array $array, array $keys)
    {
        $diff = array_diff($keys, array_keys($array));
        $this->assertTrue(!$diff, 'This array dose not contains the following keys '.
            implode(', ', $diff));
    }

}