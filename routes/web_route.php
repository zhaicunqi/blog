<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:40
 */
Route::group(['namespace' => 'Web'], function () {
    Route::get('/web', 'IndexController@index');

    Route::get('/web/article/{id}', 'ArticleController@index');
});