<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * YearsFixture
 */
class YearsFixture extends TestFixture
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
                'year' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1726451843,
                'updated_at' => 1726451843,
            ],
        ];
        parent::init();
    }
}
