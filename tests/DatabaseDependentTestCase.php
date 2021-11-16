<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;
require_once 'tests/SchemaLoader.php';

class DatabaseDependentTestCase extends TestCase
{

    /** @var EntityManager */
    protected $entitymanger;

    protected function setUp(): void
    {
        parent::setUp();
        require_once 'bootsrap-test.php';
        $this->entitymanger = $entityManager;
        // load schema in memory to run faster test
        \SchemaLoader::load($this->entitymanger);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entitymanger->close();
        $this->entitymanger=null;
    }

}