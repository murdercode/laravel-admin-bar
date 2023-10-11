<?php

// config for Murdercode/LaravelAdminBar
return [
    'style' => [
        'show3labsLogo' => true,
        'theme' => 'dark', // 'light' or 'dark'
        'max-width' => '1200px',
        'position' => 'bottom', // 'top' or 'bottom'
        'font-size' => '14px',
    ],
    'config' => [
        'adminUrl' => '/cms',
        'editPost' => [
            'enabled' => true,
            'uris' => ['articoli/{slug}', 'notizie/{slug}', 'recensioni/{slug}'], // detect the current route as defined in your routes/web.php
            'wildcard' => 'slug', // the wildcard for the parameter (as over)
            'parameterForSearch' => 'slug', // the parameter to be used for search the post
            'model' => \App\Models\Post::class, // the model to be used for search the post
            'parameterToReturn' => 'id', // the value to be returned
            'targetEndpointUrl' => '/cms/resources/posts/{parameter}',
        ],
        'emptyCachePost' => [
            'enabled' => true,
            'uris' => ['articoli/{slug}', 'notizie/{slug}', 'recensioni/{slug}'], // detect the current route as defined in your routes/web.php
            'wildcard' => 'post', // the wildcard for the parameter (as over)
            'parameterForSearch' => 'slug', // the parameter to be used for search the post
            'model' => \App\Models\Post::class, // the model to be used for search the post
            'parameterToReturn' => 'id', // the value to be returned
            'targetEndpointUrl' => '/posts/{parameter}?nocache',
        ],
    ],
];
