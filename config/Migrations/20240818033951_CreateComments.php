<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateComments extends AbstractMigration
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
        $table = $this->table('comments');
        $table->addColumn('post_id', 'integer', ['null' => false])  // 게시글의 id와 연결 (외래키)
                ->addColumn('author', 'string', ['limit' => 50])  // 작성자 이름
                ->addColumn('content', 'text')  // 코멘트 내용
                ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])  // 생성일자
                ->addColumn('modified', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])  // 수정일자
                ->addForeignKey('post_id', 'posts', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])  // 외래 키 설정
                ->create();
    }
}
