<?php

use System\Classes\PluginManager;

Route::prefix('api/v1')
    ->namespace('PlanetaDelEste\ApiGoodNews\Controllers\Api')
    ->middleware('api')
    ->group(
        function () {
            Route::prefix('blog')
                ->name('blog.')
                ->group(
                    function () {
                        Route::get('categories/list', 'Categories@list')->name('categories.list');
                        Route::apiResource('articles', 'Articles', ['only' => ['index', 'show']]);
                        Route::apiResource('categories', 'Categories', ['only' => ['index', 'show']]);

                        if (PluginManager::instance()->hasPlugin('PlanetaDelEste.JWTAuth')) {
                            Route::middleware(['jwt.auth'])
                                ->group(
                                    function () {
                                        Route::apiResource(
                                            'articles',
                                            'Articles',
                                            ['only' => ['store', 'update', 'destroy']]
                                        );
                                        Route::apiResource(
                                            'categories',
                                            'Categories',
                                            ['only' => ['store', 'update', 'destroy']]
                                        );
                                    }
                                );
                        }
                    }
                );
        }
    );
