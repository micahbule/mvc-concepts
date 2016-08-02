<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Product;

Route::get('/', function () {
    return view('home');
});

Route::get('/branch', 'BranchController@index')->name('branch-index');
Route::get('/branch/new', 'BranchController@create')->name('branch-new');
Route::post('/branch/new', 'BranchController@saveCreate');
Route::get('/branch/{id}', 'BranchController@edit')->name('branch-edit');
Route::put('/branch/{id}', 'BranchController@saveEdit');
Route::delete('/branch/{id}', 'BranchController@delete')->name('branch-delete');
Route::put('/branch/{id}/restore', 'BranchController@restore')->name('branch-restore');

Route::group(['as' => 'brand-', 'prefix' => 'brand'], function () {
	Route::get('/', 'BrandController@index')->name('index');
	Route::get('/new', 'BrandController@create')->name('new');
	Route::post('/new', 'BrandController@saveCreate');
	Route::get('/{id}', 'BrandController@edit')->name('edit');
	Route::put('/{id}', 'BrandController@saveEdit');
	Route::delete('/{id}', 'BrandController@delete')->name('delete');
	Route::put('/{id}/restore', 'BrandController@restore')->name('restore');
});

Route::put('/category/{id}/restore', 'CategoryController@restore')->name('category.restore');
Route::resource('category', 'CategoryController');
// Route::resource('product', 'ProductController');

Route::get('/generate', function () {
	$snappy = App::make('snappy.pdf');
	$htmlPdf = file_get_contents(base_path('app/Http/test.html'));
	$snappy->generateFromHtml($htmlPdf, '/tmp/testing.pdf');
	return $htmlPdf;
});

Route::get('/generate-dom', function () {
	$pdf = App::make('dompdf.wrapper');
	$htmlPdf = file_get_contents(base_path('app/Http/test.html'));
	// dd($htmlPdf);
	$pdf->loadHTML($htmlPdf);
	return $pdf->stream();
});