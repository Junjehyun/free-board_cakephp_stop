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
        //Comments 테이블을 불러옴.
        $this->Comments = TableRegistry::getTableLocator()->get('Comments');
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
     * Beginner(자바초급) method
     *
     * @return void
     */
    public function beginner() {

        // pagination load
        $this->loadComponent('Paginator');

        //검색어와 검색 조건 가져옴.
        $query = $this->request->getQuery('search-beginner');
        $keyword = $this->request->getQuery('keyword');

        // 기본 쿼리
        $conditions = [];

        // 검색 조건에 따라 조건 추가
        // case1 : 제목 , case2 : 내용 , case3 : 작성자 , case4 : 제목+내용 순서.
        if (!empty($keyword)) {
            switch($query) {
                case 'title':
                    $conditions['Posts.title LIKE'] = '%' . $keyword . '%';
                    break;
                case 'content':
                    $conditions['Posts.content LIKE'] = '%' . $keyword . '%';
                    break;
                case 'author':
                    $conditions['Posts.author LIKE'] = '%' . $keyword . '%';
                    break;
                case 'titleAndContent':
                default:
                    $conditions['OR'] = [
                        'Posts.title LIKE' => '%' . $keyword . '%',
                        'Posts.content LIKE' => '%' . $keyword . '%'
                    ];
                    break;
            }
        }

        // pagination 및 게시글 데이터, 댓글 데이터(제목에 댓글 갯수표시 위해) 가져옴.
        $posts = $this->Paginator->paginate($this->Posts->find('all',
        [
            'contain' => ['Categories', 'Comments'],
            'conditions' => $conditions,
            'order' => ['Posts.created' => 'DESC']
        ]),
        [
            'limit' => 10
        ]);

        // 각 게시글에 대한 댓글 수를 추가
        foreach ($posts as $post) {
            $post->comment_count = $this->Posts->Comments->find()
                ->where(['post_id' => $post->id])
                ->count();
        }

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
        // ID를 기준으로 게시글을 찾음. 게시판 카테고리와 코멘트도 함께 가져옴.
        $post = $this->Posts->get($id, [
            'contain' => ['Categories', 'Comments']
        ]);

        // 조회수 증가
        $post->views += 1;
        // 변경된 조회수 DB에 저장
        $this->Posts->save($post);

        // 뷰에 데이터 전달
        $this->set(compact('post'));
    }

    /**
     * 코멘트 (댓글) 작성 메서드
     *
     * @return void
     */
    public function comment() {

        // 새로운 코멘트 엔티티 생성
        $comment = $this->Comments->newEmptyEntity();

        if ($this->request->is('post')) {
        // 요청된 데이터를 코멘트 엔티티에 패치
        $comment = $this->Comments->patchEntity($comment, $this->request->getData());

        // 코멘트 데이터베이스에 저장
        if ($this->Comments->save($comment)) {
            //$this->Flash->success(__('코멘트가 성공적으로 저장되었습니다.'));
        } else {
            $this->Flash->error(__('코멘트를 저장하는 동안 문제가 발생했습니다. 다시 시도해주세요.'));
            }
        }

        // 코멘트를 작성한 게시글로 리다이렉트
        // referer() : 이전 페이지로 리다이렉트를 뜻함.
        return $this->redirect(['controller' => 'Java', 'action' => 'show', $comment->post_id]);
    }

    /**
     * 코멘트 삭제 메서드
     * POST, DELETE 요청으로만 접근 가능
     * 댓글 삭제가 성공하면 성공 메세지를, 실패하면 실패 메세지를 출력
     *
     * @param mixed $id 삭제할 댓글의 ID
     * @return void 리다이렉트
     * @throws \Cake\Http\Exception\MethodNotAllowedException 댓글을 찾을 수 없을 때 발생
     */
    public function deleteComment($id) {
        // 요청 메서드가 POST 또는 DELETE인 경우에만 이 메서드를 실행 하도록 허용
        $this->request->allowMethod(['post', 'delete']);

        // 주어진 ID를 기준으로 댓글 엔티티를 가져옴
        $comment = $this->Comments->get($id);

        // 댓글 삭제 시도
        if ($this->Comments->delete($comment)) {
            // 삭제 성공 시 성공 메세지 출력
            $this->Flash->success(__('댓글이 성공적으로 삭제되었습니다.'));
            } else {
            // 삭제 실패 시 실패 메세지 출력
            $this->Flash->error(__('댓글을 삭제하는 동안 문제가 발생했습니다. 다시 시도해주세요.'));
        }

        // 사용자가 이전에 머물렀던 페이지로 리다이렉트
        return $this->redirect(['controller' => 'Java', 'action' => 'show', $comment->post_id]);
    }

    /**
     * 댓글 수정 메서드
     * POST, PUT 요청으로만 접근 가능
     * 댓글 수정이 성공하면 성공 메세지를, 실패하면 실패 메세지를 출력
     *
     * @return void
     */
    public function editComment($id) {
        // 댓글 수정 요청이 올 때, 해당 댓글을 가져옴
        $comment = $this->Comments->get($id);

        if($this->request->is(['post', 'put'])) {
            // 댓글 데이터를 폼에서 패치
            $this->Comments->patchEntity($comment, $this->request->getData());

            if($this->Comments->save($comment)) {
                // 성공 메세지 출력
                $this->Flash->success(__('댓글이 성공적으로 수정되었습니다.'));
                return $this->redirect(['controller' => 'Java', 'action' => 'show', $comment->post_id]);
            } else {
                // 실패 메세지 출력
                $this->Flash->error(__('댓글을 수정하는 동안 문제가 발생했습니다. 다시 시도해주세요.'));
            }
        }
        // 수정 폼에 필요한 데이터 전달
        $this->set(compact('comment'));
    }

    /**
     * 게시글 수정 메서드
     *
     * @return void
     * @param mixed $id 수정할 게시글의 ID
     * @throws \Cake\Http\Exception\MethodNotAllowedException 게시글을 찾을 수 없을 때 발생
     */
    public function editPost($id) {
        // 게시글 수정 요청이 올 때, Posts 테이블에서 해당 게시글을 가져옴
        $post = $this->Posts->get($id);
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
