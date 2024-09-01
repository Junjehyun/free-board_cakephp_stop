<?php $this->assign('title', '글 상세 보기'); ?>
<div class="flex justify-center">
    <a href="<?= $this->Url->build(['controller' => 'Java', 'action' => 'show', $post->id]) ?>">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            <i class="fa-3x fa-brands fa-java"></i>
        </button>
    </a>
</div>
<div class="container w-3/5 mx-auto px-4 mt-10">
    <div class="bg-white shadow-xl rounded-lg p-6">
            <h1 class="text-4xl font-extrabold text-gray-800">
                <?= h($post->title) ?>
            </h1>
        <div class="text-gray-600 mb-8 border-b border-gray-300 pb-3 mt-5">
            <p class="text-gray-600 flex-1"><i class="fa-regular fa-user"></i> <?= h($post->author) ?></p>
            <p class="text-gray-600"><i class="fa-regular fa-clock"></i> <?= $post->created->format('y/m/d H:m:s') ?></p>
        </div>
        <div class="text-2xl text-gray-800 mb-10">
            <p><?= h($post->content) ?></p>
        </div>
        <p class="flex justify-end text-gray-600 font-bold text-xl border-b border-gray-300 pb-3">조회수: <?= $post->views ?></p>
        <div class="flex justify-end mt-5">
            <button class="bg-emerald-300 px-3 py-2 text-white border-none mr-3">
                수정
            </button>
            <button class="bg-pink-300 px-3 py-2 text-white border-none">
                삭제
            </button>
        </div>
    </div>
    <!-- 코멘트 리스트 표시 -->
    <div class="mt-10 mb-20">
        <h2 class="text-2xl font-bold mb-4 ml-1">댓글</h2>
        <?php if (!empty($post->comments)): ?>
            <div class="bg-white shadow-xl rounded-lg p-10 mb-10">
                <?php foreach ($post->comments as $comment): ?>
                    <div class="p-5 border-b border-gray-300">
                        <p class="text-gray-800"><i class="fa-regular fa-user fa-sm"></i> <?= h($comment->author) ?></p>
                        <p class="text-gray-600 text-lg"><i class="fa-regular fa-clock"></i> <?= $comment->created->format('y/m/d H:i') ?></p>
                        <p class="mt-5 text-2xl"><?= h($comment->content) ?></p>
                        <div class="flex justify-end space-x-3">
                            <!-- 댓글 수정 아이콘 -->
                            <button
                                onclick="toggleEditForm(<?= $comment->id ?>)"
                                class="text-sky-400 hover:text-sky-700 border-none h-5
                            ">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <!-- 댓글 삭제 아이콘 -->
                            <?= $this->Form->postLink(
                                '<i class="fa-solid fa-trash-alt"></i>',
                                [
                                    'controller' => 'Java',
                                    'action' => 'deleteComment',
                                    $comment->id
                                ],
                                [
                                    'confirm' => '정말 댓글을 삭제하시겠습니까?',
                                    'escape' => false,
                                    'class' => 'text-red-500 hover:text-red-700'
                                ]
                            ) ?>
                        </div>
                        <!-- 댓글 수정 폼 -->
                        <div id="edit-comment-<?= $comment->id ?>" style="display: none;">
                            <?= $this->Form->create($comment, ['url' => ['controller' => 'Java', 'action' => 'editComment', $comment->id]]) ?>
                                <?= $this->Form->textarea('content', [
                                    'class' => 'w-full bg-white shadow-xl p-2 border border-gray-300 rounded',
                                    'rows' => 4
                                    ])
                                ?>
                                <div class="text-right mt-2">
                                    <?= $this->Form->button('수정 완료', [
                                        'class' => 'bg-sky-300 text-white py-2 px-4 rounded hover:bg-sky-600 border-none'
                                        ])
                                    ?>
                                    <button type="button" onclick="toggleEditForm(<?= $comment->id ?>)" class="bg-pink-300 text-white py-2 px-4 rounded hover:bg-pink-600 border-none">
                                        취소
                                    </button>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>댓글이 없습니다. 첫 번째 댓글을 남겨보세요!</p>
        <?php endif; ?>
    </div>
    <!-- 코멘트 입력 폼 -->
    <div class="rounded-lg shadow-xl p-10 mt-10">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Java', 'action' => 'comment']]) ?>
            <?= $this->Form->hidden('post_id', ['value' => $post->id]) ?>
            <div class="mb-4">
                <?= $this->Form->control('author', [
                    'label' => '댓글작성',
                    'placeholder' => '이름을 입력하세요',
                    'class' => 'w-full p-2 border border-gray-300 rounded'
                ]) ?>
            </div>
            <div class="mb-4">
                <?= $this->Form->textarea('content', [
                    'label' => '내용',
                    'placeholder' => '댓글을 입력하세요',
                    'class' => 'w-full p-2 border border-gray-300 rounded',
                    'rows' => 4
                ]) ?>
            </div>
            <div class="text-right">
                <?= $this->Form->button('댓글 작성', [
                    'class' => 'bg-sky-400 text-white py-2 px-4 rounded hover:bg-blue-700 border-none'
                ]) ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="flex justify-end mt-10">
        <a href="/java-beginner" class="text-gray-900 hover:underline">
            <i class="fa-2x fa-solid fa-arrow-left"></i>
        </a>
    </div>
</div>
<script>
    function toggleEditForm(commentId) {
        var editForm = document.getElementById('edit-comment-' + commentId);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
        } else {
            editForm.style.display = 'none';
        }
    }
</script>
