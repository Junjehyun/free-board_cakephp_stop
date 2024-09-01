<?php $this->assign('title', '글 상세 보기'); ?>
<div class="flex justify-center">
    <a href="<?= $this->Url->build(['controller' => 'Java', 'action' => 'show', $post->id]) ?>">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            <i class="fa-3x fa-brands fa-java"></i>
        </button>
    </a>
</div>
<div class="container w-3/5 mx-auto px-4 mt-10">
    <div class="bg-white rounded-lg p-6">
            <h1 class="text-4xl font-extrabold text-gray-800">
                <?= h($post->title) ?>
            </h1>
        <div class="text-xl text-gray-600 mb-8 border-b border-gray-100 pb-3 mt-10">
            <p class="text-gray-600 flex-1"><i class="fa-regular fa-user">
                </i> 작성자: <?= h($post->author) ?>
            </p>
            <p class="text-xl text-gray-600"><i class="fa-regular fa-clock">
                </i> 작성일시: <?= $post->created->format('y/m/d H:m:s') ?>
            </p>
        </div>
        <div class="text-2xl text-gray-800 p-3 mt-10 mb-10">
            <p><?= h($post->content) ?></p>
        </div>
        <p class="flex justify-end text-gray-600 font-bold text-xl border-b border-gray-100 pb-3">
            조회수: <?= $post->views ?>
        </p>
        <div class="flex justify-end mt-5">
                <?= $this->Form->create(null, [
                    'url' => ['controller' => 'Java', 'action' => 'editPost', $post->id],
                    'type' => 'post'
                ]) ?>
                    <?= $this->Form->hidden('_method', ['value' => 'PUT']) ?>
                    <?= $this->Form->button('수정', [
                        'class' => 'bg-emerald-300 px-3 py-2 text-white border-none mr-3'
                    ]) ?>
                <?= $this->Form->end() ?>
            <button class="bg-pink-300 px-3 py-2 text-white border-none">
                삭제
            </button>
        </div>
    </div>
    <!-- 코멘트 리스트 표시 -->
    <div class="mt-10 mb-20">
        <?php if (!empty($post->comments)): ?>
            <div class="bg-white rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-3 ml-1">comments</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-zinc-50">
                        <th class="w-1/12 border-b border-gray-100 p-3 text-lg text-gray-700 text-center">작성자</th>
                        <th class="w-8/12 border-b border-gray-100 p-3 text-lg text-gray-700 text-center">내용</th>
                        <th class="w-2/12 border-b border-gray-100 p-3 text-lg text-gray-700 text-center">생성일자</th>
                        <th class="w-1/12 border-b border-gray-100 p-3 text-lg text-gray-700 text-center">설정</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($post->comments as $comment): ?>
                        <tr>
                            <td class="text-gray-800 text-center border-b border-gray-50">
                                <i class="fa-regular fa-user fa-sm"></i> <?= h($comment->author) ?>
                            </td>
                            <td class="text-gray-800 border-b border-gray-50">
                                <?= h($comment->content) ?>
                            </td>
                            <td class="text-gray-600 text-xl text-center border-b border-gray-100">
                                <i class="fa-regular fa-clock"></i> <?= $comment->created->format('y/m/d H:i') ?>
                            </td>
                            <td class="p-3 border-b border-gray-50">
                                <div class="space-x-0 text-center">
                                    <!-- 댓글 수정 아이콘 -->
                                    <button
                                        onclick="toggleEditForm(<?= $comment->id ?>)"
                                        class="text-sky-400 hover:text-sky-700 border-none h-5">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <!-- 댓글 삭제 아이콘 -->
                                    <?= $this->Form->postLink(
                                        '<i class="fa-solid fa-trash-alt"></i>',
                                        [
                                            'controller' => 'Java',
                                            'action' => 'deleteComment', $comment->id
                                        ],
                                        [
                                            'confirm' => '정말 댓글을 삭제하시겠습니까?',
                                            'escape' => false,
                                            'class' => 'text-pink-300 hover:text-pink-600'
                                        ]
                                    ) ?>
                                </div>
                            </td>
                        </tr>
                        <tr id="edit-comment-<?= $comment->id ?>" style="display: none;">
                            <td colspan="4" class="p-3">
                                <?= $this->Form->create($comment, ['url' => ['controller' => 'Java', 'action' => 'editComment', $comment->id]]) ?>
                                    <?= $this->Form->textarea('content', [
                                        'class' => 'w-full bg-white p-2 border border-gray-300 rounded mt-5',
                                        'rows' => 4
                                        ])
                                    ?>
                                    <div class="text-right mt-3">
                                        <?= $this->Form->button('수정', [
                                            'class' => 'bg-sky-300 text-white py-2 px-4 rounded hover:bg-sky-600 border-none'
                                            ])
                                        ?>
                                        <button type="button" onclick="toggleEditForm(<?= $comment->id ?>)" class="bg-pink-300 text-white py-2 px-4 rounded hover:bg-pink-600 border-none">
                                            취소
                                        </button>
                                    </div>
                                <?= $this->Form->end() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>
                댓글이 없습니다. 첫 번째 댓글을 남겨보세요!
            </p>
        <?php endif; ?>
    </div>
    <!-- 코멘트 입력 폼 -->
    <div class="rounded-lg shadow-xl p-16 mt-10">
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
                <?= $this->Form->button('작성', [
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
