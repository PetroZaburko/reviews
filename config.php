<?php

$GLOBALS['config'] = [
    'mysql' =>  [
        'host'  =>  '127.0.0.1',
        'username'  =>  'root',
        'password'  =>  'asdfg001',
        'database'  =>  'reviews',
    ],
    'cookie'    =>  [
        'cookie_name'   =>  'hash',
        'cookie_expiry' =>  604800
    ],
    'url' => [
        'path' => implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)). '/',
        'img' => 'img/reviews/'
    ],
];