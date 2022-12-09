<?php

namespace Murdercode\LaravelAdminBar;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class LaravelAdminBar
{

    public static function render(): View|Factory|Application
    {
        $postEditLink = self::getPostEditLink();
        $postEmptyCacheLink = self::getPostEmptyCacheLink();

        return view('admin-bar::render', compact('postEditLink', 'postEmptyCacheLink'));
    }

    public static function getPostEditLink(): ?string
    {
        $uri = config('admin-bar.config.editPost.uri');
        $parameterForSearch = config('admin-bar.config.editPost.parameterForSearch');
        $model = config('admin-bar.config.editPost.model');
        $wildcard = config('admin-bar.config.editPost.wildcard');
        $parameterToReturn = config('admin-bar.config.editPost.parameterToReturn');
        $enabled = config('admin-bar.config.editPost.enabled');
        $currentRoute = Route::current();
        $targetEndpointUrl = config('admin-bar.config.editPost.targetEndpointUrl');

        return self::generateLink(
            $uri,
            $currentRoute,
            $enabled,
            $model,
            $parameterForSearch,
            $wildcard,
            $parameterToReturn,
            $targetEndpointUrl
        );
    }

    public static function getPostEmptyCacheLink(): ?string
    {
        $uri = config('admin-bar.config.emptyCachePost.uri');
        $parameterForSearch = config('admin-bar.config.emptyCachePost.parameterForSearch');
        $model = config('admin-bar.config.emptyCachePost.model');
        $wildcard = config('admin-bar.config.emptyCachePost.wildcard');
        $parameterToReturn = config('admin-bar.config.emptyCachePost.parameterToReturn');
        $enabled = config('admin-bar.config.emptyCachePost.enabled');
        $currentRoute = Route::current();
        $targetEndpointUrl = config('admin-bar.config.emptyCachePost.targetEndpointUrl');

        return self::generateLink(
            $uri,
            $currentRoute,
            $enabled,
            $model,
            $parameterForSearch,
            $wildcard,
            $parameterToReturn,
            $targetEndpointUrl
        );
    }

    /**
     * @param  mixed  $uri
     * @param  \Illuminate\Routing\Route|null  $currentRoute
     * @param  mixed  $enabled
     * @param  mixed  $model
     * @param  mixed  $parameterForSearch
     * @param  mixed  $wildcard
     * @param  mixed  $parameterToReturn
     * @param  mixed  $targetEndpointUrl
     * @return array|\Illuminate\Config\Repository|Application|mixed|string|string[]|null
     */
    public static function generateLink(
        mixed $uri,
        ?\Illuminate\Routing\Route $currentRoute,
        mixed $enabled,
        mixed $model,
        mixed $parameterForSearch,
        mixed $wildcard,
        mixed $parameterToReturn,
        mixed $targetEndpointUrl
    ): mixed {
        if ($uri && $currentRoute->uri === $uri && $enabled) {
            $post = $model::where($parameterForSearch, $currentRoute->parameters[$wildcard])
                ->first();
            if ($post) {
                return str_replace(
                    '{parameter}',
                    $post->{$parameterToReturn},
                    $targetEndpointUrl
                );
            }

            return null;
        }

        return null;
    }
}
