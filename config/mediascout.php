<?php

$sandbox = env('MEDIASCOUT_SANDBOX', true);

return [
    'sandbox'  => $sandbox,
    'aio'      => [
        'inn'      => '7710974120',
        'login'    => env($sandbox ? 'MEDIASCOUT_AIO_SANDBOX_LOGIN' : 'MEDIASCOUT_AIO_LOGIN'),
        'password' => env($sandbox ? 'MEDIASCOUT_AIO_SANDBOX_PASSWORD' : 'MEDIASCOUT_AIO_PASSWORD'),
    ],
    'agencies' => [
        'maergroup'  => [
            'title'    => 'Маер Групп',
            'inn'      => '7708389669',
            'login'    => env($sandbox ? 'MEDIASCOUT_MAERGROUP_SANDBOX_LOGIN' : 'MEDIASCOUT_MAERGROUP_LOGIN'),
            'password' => env($sandbox ? 'MEDIASCOUT_MAERGROUP_SANDBOX_PASSWORD' : 'MEDIASCOUT_MAERGROUP_PASSWORD'),
        ],
        'mediagroup' => [
            'title'    => 'Медиа Групп',
            'inn'      => '7724449308',
            'login'    => env($sandbox ? 'MEDIASCOUT_MEDIAGROUP_SANDBOX_LOGIN' : 'MEDIASCOUT_MEDIAGROUP_LOGIN'),
            'password' => env($sandbox ? 'MEDIASCOUT_MEDIAGROUP_SANDBOX_PASSWORD' : 'MEDIASCOUT_MEDIAGROUP_PASSWORD'),
        ],
        'mediawest'  => [
            'title'    => 'Медиа Вест',
            'inn'      => '9726002043',
            'login'    => env($sandbox ? 'MEDIASCOUT_MEDIAWEST_SANDBOX_LOGIN' : 'MEDIASCOUT_MEDIAWEST_LOGIN'),
            'password' => env($sandbox ? 'MEDIASCOUT_MEDIAWEST_SANDBOX_PASSWORD' : 'MEDIASCOUT_MEDIAWEST_PASSWORD'),
        ]
    ]
];