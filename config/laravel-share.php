<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify the base uri for each service.
    |
    |
    |
    */

    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'text' => 'Shared from memeLords'
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => 'Shared from memeLords'
        ],
        'linkedin' => [
            'uri' => 'https://www.linkedin.com/sharing/share-offsite', // oud: http://www.linkedin.com/shareArticle
            'extra' => ['mini' => 'true'],
        ],
        'whatsapp' => [
            'uri' => 'https://wa.me/?text=',
            'extra' => ['mini' => 'true'],
        ],
        'pinterest' => [
            'uri' => 'https://pinterest.com/pin/create/button/?url=',
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit',
            'text' => 'Shared from memeLords'
        ],
        'telegram' => [
            'uri' => 'https://telegram.me/share/url',
            'text' => 'Shared from memeLords'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    |
    | Specify the version of Font Awesome that you want to use.
    | We support version 4 and 5.
    |
    |
    */

    'fontAwesomeVersion' => 5,
];
