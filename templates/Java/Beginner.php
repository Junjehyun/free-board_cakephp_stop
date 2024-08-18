<?php $this->assign('title', 'Java: 초급'); ?>
<div class="flex justify-center">
    <a href="/java-beginner">
        <button class="mb-10 py-3 px-3 text-gray-900 hover:bg-transparent hover:text-gray-900 text-5xl font-bold border-none">
            JAVA: Beginner Level
        </button>
    </a>
</div>
<div class="mt-10">
    <div class="w-full max-w-7xl mx-auto flex justify-start my-5">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'flex justify-end space-x-1']) ?>
            <select name="search-beginner" class="text-xl">
                <option value="titleAndContent" <?= $this->request->getQuery('search-beginner') === 'titleAndContent' ? 'selected' : '' ?>>제목+내용</option>
                <option value="title" <?= $this->request->getQuery('search-beginner') === 'title' ? 'selected' : '' ?>>제목</option>
                <option value="content" <?= $this->request->getQuery('search-beginner') === 'content' ? 'selected' : '' ?>>내용</option>
                <option value="author" <?= $this->request->getQuery('search-beginner') === 'author' ? 'selected' : '' ?>>작성자</option>
            </select>
            <?= $this->Form->text('keyword', [
                'placeholder' => '검색어 입력',
                'value' => $this->request->getQuery('keyword'),
                'class' => 'border border-gray-300 py-2 px-4',
                'style' => 'width: 150px;'
            ]) ?>
            <?= $this->Form->button('검색', [
                'class' => 'bg-pink-300 hover:bg-pink-600 text-white px-4 py-2 border-none rounded-r'
            ]) ?>
        <?= $this->Form->end() ?>
    </div>
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
                            <?php if ($post->comment_count > 0): ?>
                                (<?= $post->comment_count ?>)
                            <?php endif; ?>
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
<!-- 페이지네이션 링크 표시 너무 안예뻐서 추후 수정예정-->
<div class="flex justify-center">
    <ul class="pagination">
        <?= $this->Paginator->first('<< 처음') ?>
        <?= $this->Paginator->prev('< 이전') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('다음 >') ?>
        <?= $this->Paginator->last('마지막 >>') ?>
    </ul>
</div>
