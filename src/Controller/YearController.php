<?php
declare(strict_types=1);

namespace App\Controller;

class YearController extends AppController {

    // 초기값 설정
    public function initialize(): void {
        parent::initialize();

        $this->yearsTable = $this->getTableLocator()->get('Years');
    }

    public function yearIndex() {

        $years = $this->yearsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'year'
        ])->toArray()
        ;

        // 뷰에 데이터를 전달할 때, 변수명과 데이터를 명시적으로 지정
        $this->set('years', $years);
    }
}
