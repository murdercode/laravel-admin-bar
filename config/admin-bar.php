<?php

// config for Murdercode/LaravelAdminBar
return [
    'style' => [
        'show3labsLogo' => true,
        'theme' => 'dark', // 'light' or 'dark'
        'max-width' => '1000px',
        'position' => 'bottom', // 'top' or 'bottom'
        'font-size' => '14px',
    ],
    'config' => [
        'adminUrl' => '/nova',
        'editPost' => [
            'enabled' => true,
            'uri' => 'posts/{post}', // detect the current route as defined in your routes/web.php
            'wildcard' => 'post', // the wildcard for the parameter (as over)
            'parameterForSearch' => 'slug', // the parameter to be used for search the post
            'model' => \App\Models\Post::class, // the model to be used for search the post
            'parameterToReturn' => 'id', // the value to be returned
            'targetEndpointUrl' => '/nova/resources/posts/{parameter}',
        ],
        'emptyCachePost' => [
            'enabled' => true,
            'uri' => 'posts/{post}', // detect the current route as defined in your routes/web.php
            'wildcard' => 'post', // the wildcard for the parameter (as over)
            'parameterForSearch' => 'slug', // the parameter to be used for search the post
            'model' => \App\Models\Post::class, // the model to be used for search the post
            'parameterToReturn' => 'slug', // the value to be returned
            'targetEndpointUrl' => '/posts/{parameter}?nocache',
        ],
    ],
];
