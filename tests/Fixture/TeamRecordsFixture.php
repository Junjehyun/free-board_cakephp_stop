<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeamRecordsFixture
 */
class TeamRecordsFixture extends TestFixture
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
                'year_id' => 1,
                'rank' => 1,
                'team_name' => 'Lorem ipsum dolor sit amet',
                'games_played' => 1,
                'wins' => 1,
                'losses' => 1,
                'draws' => 1,
                'win_rate' => 1.5,
                'game_diff' => 1.5,
                'last_10_games' => 'Lorem ipsum dolor ',
                'streak' => 'Lorem ip',
                'home_record' => 'Lorem ipsum dolor ',
                'away_record' => 'Lorem ipsum dolor ',
                'league' => 'Lorem ip',
                'created_at' => 1726460266,
                'updated_at' => 1726460266,
            ],
        ];
        parent::init();
    }
}
