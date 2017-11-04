<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:40
 */
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/admin', 'IndexController@index');

    /**
     * 系统菜单
     */
    Route::get('/admin/menu', 'MenuController@index');
    Route::get('/admin/menu/delete/{id}', 'MenuController@delete');
    Route::match(['get', 'post'], '/admin/menu/add/{id?}', 'MenuController@add');
    Route::match(['get', 'post'], '/admin/menu/edit/{id}', 'MenuController@edit');
    Route::get('/admin/menu/toggle-display/{id}/{display}', 'MenuController@toggleDisplay');

    /**
     * 文章分类
     */
    Route::get('/admin/cate', 'CateController@index');
    Route::get('/admin/cate/delete/{id}', 'CateController@delete');
    Route::match(['get', 'post'], '/admin/cate/add/{id?}', 'CateController@add');
    Route::match(['get', 'post'], '/admin/cate/edit/{id}', 'CateController@edit');
    Route::get('/admin/cate/toggle-display/{id}/{display}', 'CateController@toggleDisplay');

    /**
     * 文章
     */
    Route::get('/admin/article', 'ArticleController@index');
    Route::get('/admin/article/content/{id}', 'ArticleController@content');
    Route::get('/admin/article/delete/{id}', 'ArticleController@delete');
    Route::match(['get', 'post'], '/admin/article/add/{id?}', 'ArticleController@add');
    Route::match(['get', 'post'], '/admin/article/edit/{id}', 'ArticleController@edit');
    Route::get('/admin/article/toggle-display/{id}/{display}', 'ArticleController@toggleDisplay');


});