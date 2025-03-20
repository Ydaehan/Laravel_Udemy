<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

// 一般的なRoute
Route::get('/about', function () {
	return "This is about page";
})->name('about');

// Route Parameters　{id} <-- これがパラメータ
Route::get('/user/{id}/{slug}', function ($id, $slug) {
	// このようにしてパラメータを取得できる
	return "Say Hello! " . $id . "-" . $slug;
})->name('user');

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
	Route::get('/create', function () {
		return "Blog Create Page";
	})->name('create');
	Route::get('/edit', function () {
		return "Blog Edit Page";
	})->name('edit');
	Route::get('/show', function () {
		return "Blog Show Page";
	})->name('show');
});

// Route Methods
/**
 * 1. GET // dataを取得する
 * 2. POST // dataを送信する
 * 3. PUT // dataを更新する -> IDとか全てのデータを送信する
 * 4. PATCH // dataを更新する -> Idとか一部のデータを送信する
 * 5. DELETE　// dataを削除する
 * 
 * Route::get('get-route', function() {
 *  return "GET Route";
 * })
 * Route::post('post-route', function() {
 *  return "GET Route";
 * })
 * Route::put('put-route', function() {
 *  return "GET Route";
 * })
 * Route::patch('patch-route', function() {
 *  return "GET Route";
 * })
 * Route::delete('delete-route', function() {
 *  return "GET Route";
 * })
 * 
 */

// Fallback route
Route::fallback(function () {
	return "Ooops! we can't find the page you are looking for :(";
});

Route::get('/contact', function () {
	return view('contact.index');
})->name('contact');
