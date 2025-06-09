<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserBusinessTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserBusinessTable Test Case
 */
class UserBusinessTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserBusinessTable
     */
    protected $UserBusiness;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UserBusiness',
        'app.Users',
        'app.Businesses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserBusiness') ? [] : ['className' => UserBusinessTable::class];
        $this->UserBusiness = $this->getTableLocator()->get('UserBusiness', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserBusiness);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserBusinessTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserBusinessTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
