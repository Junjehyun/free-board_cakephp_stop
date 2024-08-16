<?php $this->assign('title', '글 쓰기'); ?>
<!-- write.php -->
<div class="flex justify-center">
    <a href="/java-write">
        <button class="text-5xl text-black hover:bg-transparent hover:text-black font-bold mb-6 text-center border-none">Java: 새 글 작성</button>
    </a>
</div>
<div class="bg-white container w-8/12 shadow-xl mx-auto px-4 mt-10">
    <div class="p-20">
        <!--Form-->
        <?= $this->Form->create($post, ['type' => 'post', 'novalidate' => true]) ?>
            <!-- 카테고리 선택 -->
            <div class="mt-10">
                <label for="category" class="block text-lg font-semibold mb-2">카테고리</label>
                <select id="category" name="category_id" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">카테고리를 선택해주세요.</option>
                    <?php foreach ($categories as $id => $name) : ?>
                        <option value="<?= $id ?>"><?= h($name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex space-x-4 mt-5">
                <!-- 작성자 입력 -->
                <div class="w-3/12">
                    <label for="author" class="block text-lg font-semibold mb-2">작성자</label>
                    <?= $this->Form->text('author', [
                        'class' => 'w-full p-2 border border-gray-300 rounded',
                        'id' => 'author',
                        'placeholder' => '작성자'
                    ]) ?>
                </div>
                <!-- 제목 입력 -->
                <div class="w-9/12">
                    <label for="title" class="block text-lg font-semibold mb-2">제목</label>
                    <?= $this->Form->text('title', [
                        'class' => 'w-full p-2 border border-gray-300 rounded',
                        'id' => 'title',
                        'placeholder' => '제목'
                    ]) ?>
                </div>
            </div>
            <!-- 내용 입력 -->
            <div class="mt-5">
                <label for="content" class="block text-lg font-semibold mb-2">내용</label>
                <?= $this->Form->textarea('content', [
                    'class' => 'w-full h-96 p-2 border border-gray-300 rounded',
                    'id' => 'content',
                    'placeholder' => '내용'
                ]) ?>
            </div>
            <!-- 버튼 -->
            <div class="text-center mt-10">
                <?= $this->Form->button('완료', [
                    'class' => 'bg-blue-400 text-white py-2 px-6 rounded hover:bg-blue-600 border-none',
                    'type' => 'submit'
                ]) ?>
                <a href="/java-beginner">
                    <button type="button" class="bg-pink-300 text-white py-3 px-6 rounded hover:bg-pink-600 border-none">
                        취소
                    </button>
                </a>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
