<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\OracleStorageComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\OracleStorageComponent Test Case
 */
class OracleStorageComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\OracleStorageComponent
     */
    protected $OracleStorage;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->OracleStorage = new OracleStorageComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OracleStorage);

        parent::tearDown();
    }
}
