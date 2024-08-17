<?php $this->assign('title', 'Java: 초급'); ?>
<div class="flex justify-center">
    <a href="/java-beginner">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            JAVA: Beginner Level
        </button>
    </a>
</div>
<div class="w-full max-w-7xl mx-auto flex justify-end">
    <div class="flex justify-end">
        <select name="search-beginner" id="search-beginner" class="">
            <option value="titleAndContent">제목+내용</option>
            <option value="title">제목</option>
            <option value="content">내용</option>
            <option value="author">작성자</option>
        </select>
    </div>
    <input type="text" placeholder="검색어 입력" class="rounded-none border border-gray-300 py-2 px-4" style="width: 150px;">
    <button class="bg-pink-300 text-white px-4 py-2 rounded-none border-none">검색</button>
</div>
<div class="mt-10">
    <table class="w-full max-w-7xl mx-auto border-collapse border border-gray-300 shadow-xl">
        <thead>
            <tr>
                <th class="border-r border-gray-300 w-1/12 text-center p-2">
                    번호
                </th>
                <th class="border-r border-gray-300 w-7/12 text-center p-2">
                    제목
                </th>
                <th class="border-r border-gray-300 w-2/12 text-center p-2">
                    작성자
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
                            class="text-gray-500 hover:underline font-semibold">
                            <?= h($post->title) ?>
                        </a>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center font-bold text-blue-500">
                        <?= h($post->author) ?>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= $post->created->format('y/m/d') ?>
                    </td>
                    <td class="border-r border-gray-300 p-2 text-center">
                        <?= $post->views ?>
                    </td>
                    <!--추천수 추후 추가 예정-->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="w-full max-w-7xl mx-auto flex justify-end my-10">
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
