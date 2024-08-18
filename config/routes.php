<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /**
         * Main index페이지
         *
         * Main Controller 관련 Route
         */
        $builder->connect('/index',
        [
            'controller' => 'Main',
            'action' => 'index'
        ]
            )->setMethods(['GET'])
        ;

        /**
         * Java Controller
         *
         * Java Controller 관련 Route
         */

        // Java Index 페이지
        $builder->connect('/java-index',
        [
            'controller' => 'Java',
            'action' => 'index'
        ]
            )->setMethods(['GET'])
        ;

        // Java Curriculum 페이지
        $builder->connect('/java-curriculum',
        [
            'controller' => 'Java',
            'action' => 'curriculum'
        ]
            )->setMethods(['GET'])
        ;

        /**
         * Java Beginner Zone
         */

        // Java Beginner(초급) 페이지
        $builder->connect('/java-beginner',
        [
            'controller' => 'Java',
            'action' => 'beginner'
        ]
            )->setMethods(['GET'])
        ;

        /**
         * Java Intermediate Zone
         *
         */
        // Java Intermediate(중급) 페이지
        $builder->connect('/java-middle',
        [
            'controller' => 'Java',
            'action' => 'middle'
        ]
            )->setMethods(['GET'])
        ;

        // Java Advanced(고급) 페이지
        $builder->connect('/java-advanced',
        [
            'controller' => 'Java',
            'action' => 'advanced'
        ]
            )->setMethods(['GET'])
        ;

        // Java Spring 페이지
        $builder->connect('/java-spring',
        [
            'controller' => 'Java',
            'action' => 'spring'
        ]
            )->setMethods(['GET'])
        ;

        // Java 질문게시판
        $builder->connect('/java-question',
        [
            'controller' => 'Java',
            'action' => 'question'
        ]
            )->setMethods(['GET'])
        ;

        // Java 자유게시판
        $builder->connect('/java-free',
        [
            'controller' => 'Java',
            'action' => 'free'
        ]
            )->setMethods(['GET'])
        ;

        // Java 글쓰기 (Write)
        $builder->connect('/java-write',
        [
            'controller' => 'Java',
            'action' => 'write'
        ]
            )->setMethods(['GET', 'POST'])
        ;

        // Java 글 상세보기 (View, 나는 Show라고 지정함.)
        $builder->connect('/java-show/{id}',
        [
            'controller' => 'Java',
            'action' => 'show'
        ]
            )->setMethods(['GET'])
        ;

        // Java Show 페이지의 Comment 작성
        $builder->connect('/java-comment',
        [
            'controller' => 'Java',
            'action' => 'comment'
        ]
            )->setMethods(['POST'])
        ;

        // Java Show 페이지의 Comment 삭제
        $builder->connect('/java/delete-comment/{id}',
            [
                'controller' => 'Java',
                'action' => 'deleteComment'
            ],
            [
                'id' => '\d+', 'pass' => ['id'],
                'methods' => ['POST', 'DELETE']
            ]
        );

        // Java Show 페이지의 Comment 수정
        $builder->connect('/java/edit-comment/{id}',
            [
                'controller' => 'Java',
                'action' => 'editComment'
            ],
            [
                'id' => '\d+', 'pass' => ['id'],
                'methods' => ['POST', 'PUT']
            ]
        );

        /**
         * Php Controller
         *
         * Php Controller 관련 Route
         */

        /**
         * Etc Controller
         *
         * Etc Controller 관련 Route
         */


        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
