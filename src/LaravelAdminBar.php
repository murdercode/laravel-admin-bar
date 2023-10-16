<?php

namespace Murdercode\LaravelAdminBar;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class LaravelAdminBar
{
    public static function render(): View|Factory|Application|null
    {

        if (! auth()->check()) {
            return null;
        }

        $postEditLink = self::getPostEditLink();
        $postCreateLink = self::getPostCreateLink();
        $renderTime = microtime(true) - LARAVEL_START;
        $renderTime = round($renderTime, 2);

        //        $postEmptyCacheLink = self::getPostEmptyCacheLink();
        return view('admin-bar::render', compact('postEditLink', 'postCreateLink', 'renderTime'));
    }

    public static function getPostEditLink(): ?string
    {
        $uris = config('admin-bar.config.editPost.uris');
        $parameterForSearch = config('admin-bar.config.editPost.parameterForSearch');
        $model = config('admin-bar.config.editPost.model');
        $wildcard = config('admin-bar.config.editPost.wildcard');
        $parameterToReturn = config('admin-bar.config.editPost.parameterToReturn');
        $enabled = config('admin-bar.config.editPost.enabled');
        $targetEndpointUrl = config('admin-bar.config.editPost.targetEndpointUrl');

        return self::generateLink($uris, $enabled, $model, $parameterForSearch, $wildcard, $parameterToReturn, $targetEndpointUrl);
    }

    public static function getPostCreateLink(): ?string
    {
        $enabled = config('admin-bar.config.createPost.enabled');
        $targetEndpointUrl = config('admin-bar.config.createPost.targetEndpointUrl');

        if ($enabled && isset($targetEndpointUrl)) {
            return $targetEndpointUrl;
        }

        return null;
    }

    //    public static function getPostEmptyCacheLink(): ?string
    //    {
    //        $uris = config('admin-bar.config.emptyCachePost.uris');
    //        $parameterForSearch = config('admin-bar.config.emptyCachePost.parameterForSearch');
    //        $model = config('admin-bar.config.emptyCachePost.model');
    //        $wildcard = config('admin-bar.config.emptyCachePost.wildcard');
    //        $parameterToReturn = config('admin-bar.config.emptyCachePost.parameterToReturn');
    //        $enabled = config('admin-bar.config.emptyCachePost.enabled');
    //        $currentRoute = Route::current();
    //        $targetEndpointUrl = config('admin-bar.config.emptyCachePost.targetEndpointUrl');
    //
    //        return self::generateLink(
    //            $uris,
    //            $currentRoute,
    //            $enabled,
    //            $model,
    //            $parameterForSearch,
    //            $wildcard,
    //            $parameterToReturn,
    //            $targetEndpointUrl
    //        );
    //    }

    /**
     * @return array|Repository|Application|mixed|string|string[]|null
     */
    public static function generateLink(mixed $uris, mixed $enabled, mixed $model, mixed $parameterForSearch, mixed $wildcard, mixed $parameterToReturn, mixed $targetEndpointUrl): mixed
    {
        $currentRoute = Route::current() ?: null;
        foreach ($uris as $uri) {
            if ($uri && $currentRoute && $currentRoute->uri == $uri) {

                $post = $model::where($parameterForSearch, $currentRoute->parameters[$wildcard])->first();
                if ($post) {
                    return str_replace('{parameter}', $post->{$parameterToReturn}, $targetEndpointUrl);
                }

                return null;
            }
        }

        return null;
    }
}
