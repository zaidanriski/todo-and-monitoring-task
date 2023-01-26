<?php

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

// Example Routes
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index');
	Route::get('/profile', 'ProfileController@index');
	Route::post('/edit-profile/{id}', 'ProfileController@update');
	Route::post('/kirim-pesan', 'PesanController@store');
	Route::get('/message', 'PesanController@index');
	// Route::get('/home', 'HomeController@index')->name('home');

	//daily task
	Route::get('/daily-task', 'TaskController@index');
	Route::get('/tambah-task', 'TaskController@create');
	Route::post('/tambah-task', 'TaskController@store');
	Route::get('/detail-task', 'TaskController@show');
	Route::post('/update-status-task-finish', 'TaskController@updateStatusFinish');
	Route::get('/edit-task/{id}/{tanggal}', 'TaskController@edit');
	Route::post('/edit-task/{id}/{tanggal}', 'TaskController@update');

	//cm
	Route::post('/add-cm-task', 'TaskController@addCounterMeaser');
	Route::post('/update-cm-task', 'TaskController@updateCounterMeaser');
	Route::post('/add-cm-delay', 'TaskController@updateCounterMeaser');

	//reminder
	Route::post('/add-reminder', 'TaskController@addReminder');
	Route::post('/update-reminder', 'TaskController@updateReminder');

	//preproject
	Route::get('/pre-project', 'PreProjectController@index');
	Route::get('/pre-project-detail/{id}', 'PreProjectController@show');
	Route::post('/add-pre-project', 'PreProjectController@store');
	Route::post('/edit-pre-project', 'PreProjectController@update');

	//route ajax
	Route::post('/show-message', 'PesanController@show');
	Route::post('/get-status', 'TaskController@statusJson');
	Route::post('/update-status-proses', 'TaskController@statusProsesJson');
	Route::post('/update-status-open', 'TaskController@statusOpenJson');
	Route::post('/get-data-project','ProjectController@getDataJson');
	Route::post('/hapus-project','ProjectController@destroyJson');
	Route::post('/get-reminder', 'TaskController@reminderJson');
	Route::post('/delete-reminder', 'TaskController@destroyReminderJson');
	Route::post('/update-reminder-done', 'TaskController@statusDoneReminderJson');
	Route::post('/update-reminder-open', 'TaskController@statusOpenReminderJson');
	Route::post('/get-pre-project', 'PreProjectController@showJson');
	Route::post('/delete-catatan', 'PreProjectController@destroyJson');

	Route::group(['middleware' => 'checkadmin'], function () {
		//admin route
		//daily task
		Route::get('/detail-task/{id_user}', 'TaskController@show');
		Route::get('/tambah-task/{id_user}', 'TaskController@create');
		Route::post('/tambah-task/{id_user}', 'TaskController@store');

		//route ajax admin
		Route::post('/update-status-monitor', 'TaskController@statusMonitorJson');
		Route::post('/update-status-checked-ontime', 'TaskController@statusCheckedOntimeJson');
		Route::post('/update-status-checked-delay', 'TaskController@statusCheckedDelayJson');
		Route::post('/delete-task', 'TaskController@destroyTaskJson');
		Route::post('/update-problem-done', 'TaskController@problemDoneJson');
		Route::post('/delete-problem', 'TaskController@destroyProblemJson');

		//setting
		//setting project
		Route::get('master-project','ProjectController@index');
		Route::post('tambah-project','ProjectController@store');
		Route::post('edit-project','ProjectController@update');

		//setting tanggal
		Route::get('setting-tanggal','SettingTanggalController@index');
		Route::post('tambah-setting-tanggal','SettingTanggalController@store');
		Route::post('edit-setting-tanggal','SettingTanggalController@update');
	});
});
