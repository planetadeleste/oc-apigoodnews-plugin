<?php
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
                    }
                );
        }
    );
