<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * YearsSeed seed.
 */
class YearsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [];
        for ($year = 1982; $year <= 2023; $year++) {
            $data[] = [
                'year' => $year. '시즌',
                'description' => $year . '년도 기록',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $table = $this->table('years');
        $table->insert($data)->save();
    }
}
