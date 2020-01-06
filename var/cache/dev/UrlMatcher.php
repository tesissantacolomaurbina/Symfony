<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/authors' => [[['_route' => 'author', '_controller' => 'App\\Controller\\AuthorController::index'], null, null, null, true, false, null]],
        '/book' => [[['_route' => 'book.index', '_controller' => 'App\\Controller\\BookController::index'], null, null, null, true, false, null]],
        '/book/create' => [[['_route' => 'book.create', '_controller' => 'App\\Controller\\BookController::create'], null, null, null, false, false, null]],
        '/main2' => [[['_route' => 'main2', '_controller' => 'App\\Controller\\Main2Controller::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegisterController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/user_books' => [[['_route' => 'user_book.index', '_controller' => 'App\\Controller\\UserBookController::index'], null, null, null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/book/(?'
                    .'|update/([^/]++)(*:193)'
                    .'|show/([^/]++)(*:214)'
                    .'|remove/([^/]++)(*:237)'
                .')'
                .'|/user_books/(?'
                    .'|delete/([^/]++)(*:276)'
                    .'|reserve/([^/]++)(*:300)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        193 => [[['_route' => 'book.update', '_controller' => 'App\\Controller\\BookController::update'], ['id'], null, null, false, true, null]],
        214 => [[['_route' => 'book.show', '_controller' => 'App\\Controller\\BookController::show'], ['id'], null, null, false, true, null]],
        237 => [[['_route' => 'book.remove', '_controller' => 'App\\Controller\\BookController::remove'], ['id'], null, null, false, true, null]],
        276 => [[['_route' => 'user_book.destroy', '_controller' => 'App\\Controller\\UserBookController::destroy'], ['id'], null, null, true, true, null]],
        300 => [
            [['_route' => 'user_book.reserve', '_controller' => 'App\\Controller\\UserBookController::reserve'], ['id'], null, null, true, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
