<!-- write.php -->
<div class="flex justify-center">
    <a href="/java-write">
        <button class="text-5xl text-black hover:bg-transparent hover:text-black font-bold mb-6 text-center border-none">Java: 새 글 작성</button>
    </a>
</div>
<div class="bg-white container w-8/12 shadow-xl mx-auto px-4 mt-10">
    <div class="p-20">
        <!-- 카테고리 선택 -->
        <div class="mt-10">
            <label for="category" class="block text-lg font-semibold mb-2">카테고리</label>
            <select id="category" name="category" class="w-full p-2 border border-gray-300 rounded">
                <option value="java-basic">초급,중급,고급,Spring,질의응답,자유게시판 등등 셀렉트박스로</option>
                <!-- 카테고리 추가 가능 -->
            </select>
        </div>
        <div class="flex space-x-4 mt-5">
            <!-- 작성자 입력 -->
            <div class="w-3/12">
                <label for="author" class="block text-lg font-semibold mb-2">작성자</label>
                <input type="text" id="author" name="author" class="w-full p-2 border border-gray-300 rounded" placeholder="작성자" required>
            </div>
            <!-- 제목 입력 -->
            <div class="w-9/12">
                <label for="title" class="block text-lg font-semibold mb-2">제목</label>
                <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded" placeholder="제목" required>
            </div>
        </div>
        <!-- 내용 입력 -->
        <div class="mt-5">
            <label for="content" class="block text-lg font-semibold mb-2">내용</label>
            <textarea id="content" name="content" class="w-full h-96 p-2 border border-gray-300 rounded" placeholder="내용" required></textarea>
        </div>

        <!-- 파일 업로드 -->
        <!-- 이미지 등록해서? 게시글에 보이게하는거 -->

        <!-- 버튼 -->
        <div class="text-center mt-10">
            <button type="submit" class="bg-blue-400 text-white py-2 px-6 rounded hover:bg-blue-600 border-none">완료</button>
            <a href="/java-beginner">
                <button class="bg-pink-300 text-white py-3 px-6 rounded hover:bg-pink-600 border-none">
                    취소
                </button>
            </a>
        </div>
    </div>
</div>
