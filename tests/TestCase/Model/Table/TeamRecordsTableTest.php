<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamRecordsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamRecordsTable Test Case
 */
class TeamRecordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamRecordsTable
     */
    protected $TeamRecords;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TeamRecords',
        'app.Years',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TeamRecords') ? [] : ['className' => TeamRecordsTable::class];
        $this->TeamRecords = $this->getTableLocator()->get('TeamRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TeamRecords);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TeamRecordsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TeamRecordsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
