<?php
declare(strict_types=1);

namespace App\Controller;

class YearController extends AppController {

    // 초기값 설정
    public function initialize(): void {

        parent::initialize();

        $this->yearsTable = $this->getTableLocator()->get('Years');
        $this->teamRecordsTable = $this->getTableLocator()->get('TeamRecords');

    }

    public function yearIndex() {

        // 연도별 셀렉트 박스
        $years = $this->yearsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'year'
        ])->toArray()
        ;

        // 뷰에 데이터를 전달할 때, 변수명과 데이터를 명시적으로 지정
        $this->set('years',$years);

        // 뷰에 2023년 가장 최근 팀 순위 표시 (디폴트)
        $defaultYear = 2023;

        // TeamRecords 테이블에서 2023년 데이터를 가져옴
        $teamRecords = $this->teamRecordsTable->find('all')
            ->where(['year_id' => $defaultYear])
            ->order(['ranking' => 'ASC'])
            ->toArray()
            ;

        $this->set('teamRecords', $teamRecords);
        $this->set('defaultYear', $defaultYear);

    }

    public function getTeamRecords() {

    }
}
