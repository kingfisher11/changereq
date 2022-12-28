<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\TicketController::class, 'guestCreate'])->name('guest.feedback.create');
// Route::get('/mail-sent', [\App\Http\Controllers\MailController::class, 'newTicket'])->name('new.ticket.mail');
Route::get('/dashboard', function () {
	return view('dashboard/index');
})->name('dashboard');
// Route::get('/test', [App\Http\Controllers\TicketController::class, 'testpage'])->name('test');


Auth::routes();
Route::get('/blade', [App\Http\Controllers\TicketController::class, 'test'])->name('test');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//create ticket
Route::get('create', [App\Http\Controllers\TicketController::class, 'create'])->name('create.index');
Route::get('/guest/feedback/create', [\App\Http\Controllers\TicketController::class, 'guestCreate'])->name('guest.feedback.create');
Route::post('/guest/feedback/store', [\App\Http\Controllers\TicketController::class, 'guestStore'])->name('guest.feedback.store');
Route::get('/guest/feedback/success/{ticket}', [\App\Http\Controllers\TicketController::class, 'guestSuccess'])->name('guest.feedback.success');
Route::get('guest/feedback/search/',[App\Http\Controllers\TicketController::class, 'searchFeedback'])->name('ticket.search');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	//ticket management
	Route::get('admin/feedback', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
	Route::get('admin/feedback/resolved', [App\Http\Controllers\TicketController::class, 'resolved'])->name('tickets.index.resolved');
	Route::get('/admin/feedback/create', [\App\Http\Controllers\TicketController::class, 'create'])->name('ticket.create');
	Route::post('admin/feedback/store', [\App\Http\Controllers\TicketController::class, 'store'])->name('ticket.store');
	Route::get('admin/feedback/show/{ticket}',[App\Http\Controllers\TicketController::class, 'show'])->name('ticket.show');
	Route::get('admin/feedback/assign/{ticket}',[App\Http\Controllers\TicketController::class, 'assign'])->name('ticket.assign');
	Route::post('admin/feedback/assign/update', [\App\Http\Controllers\TicketController::class, 'updateTicket'])->name('ticket.update');
	Route::get('admin/feedback/response/show/{response}',[App\Http\Controllers\TicketController::class, 'showResponse'])->name('ticket.show.response');
	Route::get('admin/feedback/response/reply/{response}',[App\Http\Controllers\TicketController::class, 'reply'])->name('ticket.reply.response');
	Route::post('admin/feedback/store/reply', [\App\Http\Controllers\TicketController::class, 'storeReply'])->name('ticket.store.reply');
	Route::get('admin/feedback/reply/{ticket}',[App\Http\Controllers\TicketController::class, 'replySender'])->name('ticket.reply');



	//department route
	Route::get('admin/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('department.index');
	Route::get('admin/departments/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('department.create');
	Route::post('admin/departments/store', [\App\Http\Controllers\DepartmentController::class, 'store'])->name('department.store');
	Route::post('admin/departments/import', [\App\Http\Controllers\DepartmentController::class, 'import'])->name('department.import');

	
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
	Route::get('admin/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
	Route::post('admin/user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
	Route::get('admin/user/show/{user}',[App\Http\Controllers\UserController::class, 'show'])->name('user.show');
	Route::get('/user/import', [\App\Http\Controllers\UserController::class, 'import'])->name('user.import');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

