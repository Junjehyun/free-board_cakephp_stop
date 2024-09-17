<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeamRecord Entity
 *
 * @property int $id
 * @property int $year_id
 * @property int $rank
 * @property string $team_name
 * @property int $games_played
 * @property int $wins
 * @property int $losses
 * @property int $draws
 * @property string $win_rate
 * @property string $game_diff
 * @property string $last_10_games
 * @property string $streak
 * @property string $home_record
 * @property string $away_record
 * @property string $league
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Year $year
 */
class TeamRecord extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'year_id' => true,
        'rank' => true,
        'team_name' => true,
        'games_played' => true,
        'wins' => true,
        'losses' => true,
        'draws' => true,
        'win_rate' => true,
        'game_diff' => true,
        'last_10_games' => true,
        'streak' => true,
        'home_record' => true,
        'away_record' => true,
        'league' => true,
        'created_at' => true,
        'updated_at' => true,
        'year' => true,
    ];
}
