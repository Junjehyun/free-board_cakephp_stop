<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

/**
 * 타이틀 커스터마이징화
 *
 * 기본값: UnKnown
 * 각 페이지별로 커스터 마이징 허셈
 */
$defaulTitle = 'History of KBO';
$pageTitle = $this->fetch('title');

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $defaulTitle ?><?= $pageTitle ? ' - ' . $pageTitle : '' ?>
    </title>
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <!--tailwind css-->
    <?= $this->Html->css('output') ?>

    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">

    <?= $this->Html->css('tailwind') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        body {
            font-family: 'Gowun Dodum', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Gowun Dodum', sans-serif;
        }
    </style>
</head>
<body class="font-gowun-dodum bg-white flex flex-col min-h-screen">
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/index') ?>">
                <span>
                    <img src="img/logo/kbo_header_logo.jpg" style="width:80px;">
                </span>
                <!-- <span> KBO </span>HISTORY -->
            </a>
        </div>
        <div class="top-nav-links">
            <!-- <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a> -->
        </div>
    </nav>
    <main class="main flex-grow my-20">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
        <?= $this->element('footer') ?>
</body>
</html>
