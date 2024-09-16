<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTeamRecords extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        // 팀 기록 테이블 생성
        $table = $this->table('team_records');
        $table
            // 연도
            ->addColumn('year_id', 'integer', ['null' => false])
            // 순위
            ->addColumn('rank', 'integer', ['null' => false])
            // 팀 이름
            ->addColumn('team_name', 'string', ['limit' => 255, 'null' => false])
            // 게임 수
            ->addColumn('games_played', 'integer', ['null' => false])
            // 승
            ->addColumn('wins', 'integer', ['null' => false])
            // 패
            ->addColumn('losses', 'integer', ['null' => false])
            // 무
            ->addColumn('draws', 'integer', ['default' => 0])
            // 승률
            ->addColumn('win_rate', 'decimal', ['precision' => 5, 'scale' => 3])
            // 게임차
            ->addColumn('game_diff', 'decimal', ['precision' => 5, 'scale' => 2])
            // 최근 10경기
            ->addColumn('last_10_games', 'string', ['limit' => 20])
            // 연속
            ->addColumn('streak', 'string', ['limit' => 10])
            // 홈 기록
            ->addColumn('home_record', 'string', ['limit' => 20])
            // 원정 기록
            ->addColumn('away_record', 'string', ['limit' => 20])
            // 생성일시, 수정일시
            ->addTimestamps('created_at', 'updated_at')
            ->create();
    }
}
