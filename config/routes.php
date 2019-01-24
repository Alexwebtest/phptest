<?php

return [

    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    'news/([0-9]+)' => [
        'controller' => 'news',
        'action' => 'single'
    ],
    'news' => [
        'controller' => 'news',
        'action' => 'list'
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ],

    'admin' => [
        'controller' => 'admin',
        'action' => 'index'
    ],
    /* ajax */
    'user/registration' => [
        'controller' => 'user',
        'action' => 'registration'
    ],
    'user/login' => [
        'controller' => 'user',
        'action' => 'login'
    ],
    'user/logout' => [
        'controller' => 'user',
        'action' => 'logout'
    ],
];
