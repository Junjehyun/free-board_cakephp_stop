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
        $years = $this->yearsTable->find('list', [
            'keyField' => 'year',
            'valueField' => 'year',
        ])->toArray();

        $teamRecords = $this->teamRecordsTable->find('all')
            ->where(['teamRecords.year_id' => 1])
            ->order(['teamRecords.ranking' => 'ASC'])
            ->toArray();

        $defaultYear = "";

        $this->set(compact('years','teamRecords','defaultYear'));
    }

    public function getTeamRecords($year_id = null) {

        $this->request->allowMethod(['get']);

        if($year_id) {
            $teamRecords = $this->teamRecordsTable->find('all')
                ->where(['teamRecords.year_id' => $year_id])
                //->contain(['Years'])
                ->order(['teamRecords.ranking' => 'ASC'])
                ->toArray();

            // json 응답 설정
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['success' => true, 'records' => $teamRecords]));
        } else {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['success' => false, 'message' => '잘못된 요청입니다.']));
        }
    }
}
