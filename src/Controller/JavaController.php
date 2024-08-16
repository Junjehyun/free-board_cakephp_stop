<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class JavaController extends AppController
{

    /**
     * 초기화 세팅
     * @return void
     */
    public function initialize(): void{

        parent::initialize();

        //Posts 테이블을 불러옴.
        $this->Posts = TableRegistry::getTableLocator()->get('Posts');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

    }

    /**
     * Curriculum method
     *
     * @return void
     */
    public function curriculum() {

    }

    /**
     * Beginner method
     *
     * @return void
     */
    public function beginner() {

        // 게시글 데이터 가져옴.
        $posts = $this->Posts->find('all', [
            'contain' => ['Categories'],
            'order' => ['Posts.created' => 'DESC']
        ]);

        // 뷰에 데이터 전달
        $this->set(compact('posts'));
    }

    /**
     * write (글쓰기)
     *
     * @return void
     */
    public function write() {
        // 새로운 게시글 엔티티 생성
        $post = $this->Posts->newEmptyEntity();
        // Post요청
        if ($this->request->is('post')) {
            // 폼에서 전송된 데이터를 엔티티에 패치
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            // 데이터베이스에 게시글 저장
            if ($this->Posts->save($post)) {
                // 성공 시 성공 메세지 출력
                $this->Flash->success(__('게시글이 성공적으로 저장되었습니다.'));
                // 리다이렉트 (글 목록으로 이동)
                return $this->redirect(['action' => 'beginner']);
            }
            // 저장 실패 시 실패 메세지 출력
            $this->Flash->error(__('게시글을 저장하는 동안 문제가 발생했습니다. 다시 시도해주세요.'));
        }
        // posts의 category_id를 참조하여 categories 테이블의 id와 name을 가져옴 (id가 key, name이 value)
        $categories = $this->Posts->Categories->find('list');
        //뷰 변수에 할당
        $this->set(compact('categories', 'post'));
    }

    /**
     * 게시글 보기 (show)
     *
     * @param mixed $id
     * @return void
     */
    public function show($id) {
        // ID를 기준으로 게시글을 찾음.
        $post = $this->Posts->get($id, [
            'contain' => ['Categories']
        ]);

        // 조회수 증가
        $post->views += 1;
        // 변경된 조회수 DB에 저장
        $this->Posts->save($post);

        // 뷰에 데이터 전달
        $this->set(compact('post'));
    }

    /**
     * Middle method
     *
     * @return void
     */
    public function middle() {

    }

    /**
     * Advanced method
     *
     * @return void
     */
    public function advanced() {

    }

    /**
     * Spring method
     *
     * @return void
     */
    public function spring() {

    }

    /**
     * Q&ABoard method
     *
     * @return void
     */
    public function question() {

    }

    /**
     * FreeBoard method
     *
     * @return void
     */
    public function free() {

    }
}
