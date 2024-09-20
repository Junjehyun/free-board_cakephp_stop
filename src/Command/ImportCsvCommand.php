<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\File;
/**
 * ImportCsv command.
 */
class ImportCsvCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        $parser->addArgument('csv_file', [
            'help' => 'csv/year_records.csv',
            'required' => true
        ]);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io) {
        // csv 파일 경로 가져오기
        $csvFilePath = WWW_ROOT . 'csv' . DS . $args->getArgument('csv_file');

        if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
            // 데이터를 저장할 빈 배열로 일단..
            $data = [];

            // 파일에서 각 행을 읽어와서 배열에 저장
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // year_id '0'인 경우는 제외
                if (isset($row[0]) && $row[0] != 0) {
                    $data[] = $row;
                }
            }

            fclose($handle);
            // year_id가 0이 아닌 데이터만 출력 확인
            //dd($data);
        } else {
            echo "CSV 파일을 열 수 없습니다.";
        }

        // 데이터베이스 연결
        $this->getTableLocator()->get('TeamRecords');

        foreach ($data as $index => $row) {
            // 첫 번째 행은 CSV 헤더일 수 있으므로 건너뛰기 (옵션)
            if ($index === 0) {
                continue;
            }

             // YearRecord 엔티티 생성
            $teamRecordsTable = $this->getTableLocator()->get('TeamRecords');
            $teamRecord = $teamRecordsTable->newEmptyEntity();

            // 배열 데이터를 엔티티에 매핑
            $teamRecord->year_id = (int)$row[0];
            $teamRecord->ranking = (int)$row[1];
            $teamRecord->team_name = $row[2];
            $teamRecord->games_played = (int)$row[3];
            $teamRecord->wins = (int)$row[4];
            $teamRecord->losses = (int)$row[5];
            $teamRecord->draws = (int)$row[6];
            $teamRecord->win_rate = (float)$row[7];
            $teamRecord->game_diff = (float)$row[8];
            $teamRecord->last_10_games = $row[9];
            $teamRecord->streak = $row[10];
            $teamRecord->home_record = $row[11];
            $teamRecord->away_record = $row[12];

            // league 필드 추가
            if ($teamRecord->year_id === 1999 || $teamRecord->year_id === 2000) {
                $teamRecord->league = $row[13]; // CSV 파일에서 리그 값을 불러옴
            } else {
                $teamRecord->league = null; // 그 외의 시즌은 null로 설정
            }

            // 데이터베이스에 저장
            if ($teamRecordsTable->save($teamRecord)) {
                $io->out("Record saved for year: " . $teamRecord->year_id);
            } else {
                $io->err("Failed to save record for year: " . $teamRecord->year_id);
            }
        }
    }
}
