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
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/abonne' => [[['_route' => 'app_abonne_index', '_controller' => 'App\\Controller\\AbonneController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/abonne/new' => [[['_route' => 'app_abonne_new', '_controller' => 'App\\Controller\\AbonneController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/livre' => [[['_route' => 'livre', '_controller' => 'App\\Controller\\LivreController::index'], null, null, null, false, false, null]],
        '/admin/livre/ajouter' => [[['_route' => 'livre_ajouter', '_controller' => 'App\\Controller\\LivreController::ajouter'], null, null, null, false, false, null]],
        '/admin/livre/nouveau' => [[['_route' => 'livre_nouveau', '_controller' => 'App\\Controller\\LivreController::nouveau'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/test' => [[['_route' => 'app_test', '_controller' => 'App\\Controller\\TestController::index'], null, null, null, false, false, null]],
        '/test/accueil' => [[['_route' => 'app_test_accueil', '_controller' => 'App\\Controller\\TestController::accueil'], null, null, null, false, false, null]],
        '/test/heritage' => [[['_route' => 'app_test_heritage', '_controller' => 'App\\Controller\\TestController::heritage'], null, null, null, false, false, null]],
        '/test/transitif' => [[['_route' => 'app_test_transitif', '_controller' => 'App\\Controller\\TestController::transitif'], null, null, null, false, false, null]],
        '/test/tableau' => [[['_route' => 'app_test_tableau', '_controller' => 'App\\Controller\\TestController::tableau'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|abonne/([^/]++)(?'
                        .'|(*:230)'
                        .'|/edit(*:243)'
                        .'|(*:251)'
                    .')'
                    .'|livre/(?'
                        .'|modifier/([^/]++)(*:286)'
                        .'|supprimer/([^/]++)(*:312)'
                    .')'
                .')'
                .'|/test/(?'
                    .'|salutation(?:/([^/]++))?(*:355)'
                    .'|calcul/([0-9]+)/([0-9]+)(*:387)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        230 => [[['_route' => 'app_abonne_show', '_controller' => 'App\\Controller\\AbonneController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        243 => [[['_route' => 'app_abonne_edit', '_controller' => 'App\\Controller\\AbonneController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        251 => [[['_route' => 'app_abonne_delete', '_controller' => 'App\\Controller\\AbonneController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        286 => [[['_route' => 'livre_modifier', '_controller' => 'App\\Controller\\LivreController::modifier'], ['id'], null, null, false, true, null]],
        312 => [[['_route' => 'livre_supprimer', '_controller' => 'App\\Controller\\LivreController::supprimer'], ['id'], null, null, false, true, null]],
        355 => [[['_route' => 'app_test_salutation', 'prenom' => null, '_controller' => 'App\\Controller\\TestController::salutation'], ['prenom'], null, null, false, true, null]],
        387 => [
            [['_route' => 'app_test_calcul', '_controller' => 'App\\Controller\\TestController::calcul'], ['nb1', 'nb2'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
