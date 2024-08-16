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
    <div class="flex justify-end mt-10">
        <a href="/java-beginner" class="text-gray-900 hover:underline"><i class="fa-2x fa-solid fa-arrow-left"></i></a>
    </div>
</div>
