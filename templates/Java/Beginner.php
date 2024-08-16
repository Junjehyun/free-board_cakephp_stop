<?php $this->assign('title', 'Java: 초급'); ?>
<div class="flex justify-center">
    <a href="/java-beginner">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            JAVA: 초급레벨(Beginner)
        </button>
    </a>
</div>
<div class="mt-10">
    <table class="w-full border-collapse border border-gray-300 shadow-xl">
        <thead>
            <tr>
                <th class="border-r border-gray-300 w-1/12 text-center p-2">
                    번호
                </th>
                <th class="border-r border-gray-300 w-8/12 text-center p-2">
                    제목
                </th>
                <th class="border-r border-gray-300 w-1/12 text-center p-2">
                    글쓴이
                </th>
                <th class="border-r border-gray-300 w-1/12 text-center p-2">
                    작성일
                </th>
                <th class="border-r border-gray-300 w-1/12 text-center p-2">
                    조회수
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= $post->id ?>
                    </td>
                    <td class="border-r border-gray-300 p-2">
                        <a href="<?= $this->Url->build(['controller' => 'Java', 'action' => 'show', $post->id]) ?>"
                            class="text-gray-500 hover:underline">
                            <?= h($post->title) ?>
                        </a>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= h($post->author) ?>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= $post->created->format('Y-m-d') ?>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= $post->views ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="flex justify-end my-10">
    <a href="/java-write">
        <button class="bg-sky-300 hover:bg-sky-600 text-white font-semi-bold py-2 px-3 mr-3 border-none">
            글쓰기
        </button>
    </a>
    <a href="/java-index">
        <button class="mb-10 bg-pink-300 py-2 px-3 text-white font-semi-bold hover:bg-pink-600 border-none">
            뒤로
        </button>
    </a>
</div>
