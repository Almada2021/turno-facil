<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserBusinessFixture
 */
class UserBusinessFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'user_business';
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
                'user_id' => 1,
                'business_id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-06-09 09:01:19',
                'modified' => '2025-06-09 09:01:19',
            ],
        ];
        parent::init();
    }
}
