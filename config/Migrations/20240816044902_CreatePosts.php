<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePosts extends AbstractMigration
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
        $table = $this->table('posts');
        $table->addColumn('title', 'string', ['limit' => 30])  // 게시글의 제목
            ->addColumn('content', 'text')  // 게시글의 내용
            ->addColumn('author', 'string', ['limit' => 15])  // 작성자의 이름
            ->addColumn('category_id', 'integer')  // 게시글의 카테고리
            ->addColumn('views', 'integer', ['default' => 0])  // 게시글의 조회수 (기본값 0)
            ->addColumn('image', 'string', ['limit' => 255, 'null' => true])  // 이미지 파일 경로 (null 허용)
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])  // 생성일자
            ->addColumn('modified', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])  // 수정일자
            ->create();
    }
}
