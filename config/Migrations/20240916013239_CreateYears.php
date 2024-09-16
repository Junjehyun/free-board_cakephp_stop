<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateYears extends AbstractMigration
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
        // 테이블을 정의함 ('years'라는 테이블을 생성)
        $table = $this->table('years');
        // 'year'라는 컬럼을 추가 (정수형, NULL 값 허용 안됨, 길이 4)
        $table->addColumn('year', 'string',
        [
            'null' => false,
            'limit' => 50,
        ])
        // 'description'이라는 컬럼을 추가 (문자열, 최대 255자, NULL 값 허용)
        ->addColumn('description', 'string', [
            'limit' => 255, 'null' => true
        ])
        // 'created_at'과 'updated_at'이라는 타임스탬프 컬럼을 추가
        ->addTimestamps('created_at', 'updated_at')
        // 테이블 생성
        ->create();
    }
}
