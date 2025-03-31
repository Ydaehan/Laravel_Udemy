<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('/file-upload', [FileUploadController::class, 'store'])->name('file.store');
Route::get('/file-download', [FileUploadController::class, 'download'])->name('file.download');	


// Route::get('/about', [HomeController::class, 'showAboutPage']);

// Route::get('/single-action', SingleActionController::class);

// BLOG
// Create
// Read
// Update
// Delete
// (CRUD)

// Route::resource('/blog', BlogController::class);
// Route::get('/blog', function () {
// 	$blogs = Blog::all(); // SELECT * FROM blogs
// 	dd($blogs);
// });

// // 一般的なRoute
// Route::get('/about', function () {
// 	return "This is about page";
// })->name('about');

// // Route Parameters　{id} <-- これがパラメータ
// Route::get('/user/{id}/{slug}', function ($id, $slug) {
// 	// このようにしてパラメータを取得できる
// 	return "Say Hello! " . $id . "-" . $slug;
// })->name('user');

// Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
// 	Route::get('/create', function () {
// 		return "Blog Create Page";
// 	})->name('create');
// 	Route::get('/edit', function () {
// 		return "Blog Edit Page";
// 	})->name('edit');
// 	Route::get('/show', function () {
// 		return "Blog Show Page";
// 	})->name('show');
// });

// // Route Methods
// /**
//  * 1. GET // dataを取得する
//  * 2. POST // dataを送信する
//  * 3. PUT // dataを更新する -> IDとか全てのデータを送信する
//  * 4. PATCH // dataを更新する -> Idとか一部のデータを送信する
//  * 5. DELETE　// dataを削除する
//  * 
//  * Route::get('get-route', function() {
//  *  return "GET Route";
//  * })
//  * Route::post('post-route', function() {
//  *  return "GET Route";
//  * })
//  * Route::put('put-route', function() {
//  *  return "GET Route";
//  * })
//  * Route::patch('patch-route', function() {
//  *  return "GET Route";
//  * })
//  * Route::delete('delete-route', function() {
//  *  return "GET Route";
//  * })
//  * 
//  */

// // Fallback route
// Route::fallback(function () {
// 	return "Ooops! we can't find the page you are looking for :(";
// });

// Route::get('/contact', function () {
// 	$title = "Contact Page!";
// 	$description = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque obcaecati eum, doloribus quia commodi laborum
// 	temporibus quae voluptatem ab? Ea dolorem corporis neque sapiente optio quis nihil, accusantium esse porro?";

// 	$books = ["Deep work", "Steal like a artist", "Story Band"];
// 	return view('contact.index', ['title' => $title, 'description' => $description, 'books' => $books]);
// })->name('contact');
