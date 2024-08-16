<?php $this->assign('title', '글 상세 보기'); ?>
<div class="flex justify-center">
    <a href="<?= $this->Url->build(['controller' => 'Java', 'action' => 'show', $post->id]) ?>">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            글 상세 보기
        </button>
    </a>
</div>
<div class="container w-3/5 mx-auto px-4 mt-10">
    <div class="bg-white shadow-xl rounded-lg p-6">
    <div class="flex justify-between items-center mb-6 border-b border-gray-300 pb-3">
        <div class="flex-1"></div> <!-- 제목을 중앙에 배치하기 위한 빈 공간 -->
        <h1 class="text-4xl font-extrabold text-gray-800 text-center flex-1">
            <?= h($post->title) ?>
        </h1>
        <p class="text-gray-600 flex-1 text-right">작성자: <?= h($post->author) ?></p>
    </div>
        <div class="mt-20 text-2xl font-semibold text-gray-800 text-center">
            <p><?= h($post->content) ?></p>
        </div>

        <p class="flex justify-end text-gray-600">작성일: <?= $post->created->format('Y년m월d일') ?></p>
        <p class="flex justify-end text-gray-600">조회수: <?= $post->views ?></p>
        <div class="flex justify-end mt-5">
            <button class="bg-blue-500 px-3 py-2 text-white border-none mr-3">수정</button>
            <button class="bg-pink-500 px-3 py-2 text-white border-none">삭제</button>
        </div>
    </div>
    <div class="flex justify-end mt-10">
        <a href="/java-beginner" class="text-gray-900 hover:underline">목록으로</a>
    </div>

</div>
