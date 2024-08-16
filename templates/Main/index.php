<?php $this->assign('title', '메인'); ?>
<div class="container flex justify-center mx-auto max-w-4xl p-6 py-8">
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 mx-auto">
        <a href="#">
            <button class="bg-sky-300 hover:bg-sky-400 text-white font-bold py-8 px-10 rounded w-full h-40 text-xl sm:text-xl lg:text-4xl transform transition duration-500 ease-in-out hover:scale-110 border-none">
                <i class="fas fa-bell mr-2"></i>
                공지사항
            </button>
        </a>
        <a href="java-index">
            <button class="bg-green-300 hover:bg-green-400 text-white font-bold py-8 px-10 rounded w-full h-40 text-xl sm:text-xl lg:text-4xl transform transition duration-500 ease-in-out hover:scale-110 border-none">
            <i class="fa-brands fa-java"></i>
                JAVA
            </button>
        </a>
        <a href="#">
            <button class="bg-purple-300 hover:bg-purple-400 text-white font-bold py-8 px-10 rounded w-full h-40 text-xl sm:text-xl lg:text-4xl transform transition duration-500 ease-in-out hover:scale-110 border-none">
                <i class="fa-brands fa-php"></i>
                PHP
            </button>
        </a>
    </div>
</div>
