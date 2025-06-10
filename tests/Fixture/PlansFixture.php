<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlansFixture
 */
class PlansFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'duration' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-06-09 22:13:12',
                'modified' => '2025-06-09 22:13:12',
            ],
        ];
        parent::init();
    }
}
