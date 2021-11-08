<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class DatabaseDependentTestCase extends TestCase
{

    /** @var EntityManager */
    protected $entitymanger;

    protected function setUp(): void
    {
        parent::setUp();
        require_once 'bootsrap-test.php';
        $this->entitymanger = $entityManager;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entitymanger->close();
    }

}