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

    'cabinet' => [
        'controller' => 'admin',
        'action' => 'index'
    ],
    'cabinet/options' => [
        'controller' => 'admin',
        'action' => 'options'
    ],
    /* ajax */
    'ajax/registration' => [
        'controller' => 'auth',
        'action' => 'registration'
    ],
    'ajax/login' => [
        'controller' => 'auth',
        'action' => 'login'
    ],
    'ajax/logout' => [
        'controller' => 'auth',
        'action' => 'logout'
    ],
    
];
