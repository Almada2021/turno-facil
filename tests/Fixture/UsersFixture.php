<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-06-07 23:48:30',
                'modified' => '2025-06-07 23:48:30',
                'name' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'phonenumber' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
