<?php
Route::post(config('portmanat.result_url'),'\App\Http\Controllers\PortmanatController@result');
Route::get(config('portmanat.success_url'),'\App\Http\Controllers\PortmanatController@success');
Route::get(config('portmanat.failed_url'),'\App\Http\Controllers\PortmanatController@failed');
