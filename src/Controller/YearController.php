<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class YearController extends AppController {

    // 초기값 설정
    public function initialize(): void {

        parent::initialize();

        $this->yearsTable = $this->getTableLocator()->get('Years');
        $this->teamRecordsTable = $this->getTableLocator()->get('TeamRecords');

    }

    public function yearIndex() {
    }

    public function getTeamRecords($year_id = null) {

    }
}
