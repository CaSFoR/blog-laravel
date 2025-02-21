<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


  Auth::routes();

  
  Route::fallback( fn() => redirect()->to('/') );
  Route::get('/','PageControllerIndex@index')->name('index');
  Route::get('/search', 'SearchController@search')->name('articles.search');
  Route::get('/tag-search/{tag}', 'TagSearchController@search')->name('tag.search');



Route::middleware('auth')->prefix('dashboard')->group(function(){
  
  Route::get('account', 'ProfileController@index')->name('dashboard')->middleware('role:Auther,User');
  Route::get('edit','ProfileController@edit')->name('editInfo');
  Route::patch('update','ProfileController@update')->name('updateInfo');
  Route::delete('destroy','ProfileController@destroy')->name('destroyProfile');
  Route::patch('updatePassword','PasswordUpdate@update')->name('updatePassword');
   Route::patch('/upload-avatar', 'UserAvatar@store')->name('upload-avatar');
  
});
 ////////////////////////////////// Contact Us   ///////////////////////////////
Route::prefix('contact')->group(function(){
  Route::get('/','ContactPageController@index')->name('contact.index');
  Route::post('/sendMessage','ContactPageController@store')->name('contact.store');
});

 ////////////////////////////////// Auther  ///////////////////////////////
Route::middleware('auth')->group(function () {
  Route::get('/my-articles', 'MyArticlesController@index')->name('my-articles')->middleware('role:Auther','status');
  Route::get('/my-favorite', 'MyFavorite@index')->name('favorite.index');
});

  Route::resource('articles','ArticleController');

  Route::get('profile/{authorName}', 'AuthorProfile@index')->name('author-profile');
  Route::get('author-articles/{authorName}', 'AuthorArticles@index')->name('author-articles');

  Route::middleware(['auth','role:Admin'])->prefix('master-dashboard')->group(function () {
  
  ////////////////////////////////// Main   ///////////////////////////////
  Route::get('/', 'MasterDashboardController@index')->name('dashboard.index');
  
  ///////////////////////////////// Category  //////////////////////////////
  Route::get('/categories', 'CategoryController@index')->name('category.index');
  Route::post('/categories/create/category', 'CategoryController@store')->name('category.store');
  Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('category.edit');
  Route::put('/{category}', 'CategoryController@update')->name('category.update');
  Route::delete('/categories/{category}', 'CategoryController@destroy')->name('category.destroy');
  
  /////////////////////////////////  Role  //////////////////////////////
  Route::get('/roles', 'RoleController@index')->name('role.index');
  Route::post('/roles/create/role', 'RoleController@storeRole')->name('role.store');
  Route::get('/roles/{role}/edit', 'RoleController@edit')->name('role.edit');
  Route::put('/{role}', 'RoleController@update')->name('role.update');
  Route::delete('/roles/{role}', 'RoleController@destroy')->name('role.destroy');

  ///////////////////////////////  User  //////////////////////////////

  Route::get('/{user}/edit', 'UserController@edit')->name('user.edit');
  Route::put('/{user}/update', 'UserController@update')->name('user.update');
  Route::delete('/{user}', 'UserController@destroy')->name('user.destroy');
});
Route::get('/inactive-account', function () {
  return view('inactive_account');
})->name('inactive-account');