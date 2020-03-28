<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Covid\Groups\Application\Groups;

Route::get('/', function (Request $request) {
    return view('home');
})->name('home');

Route::get('/groups', function (Request $request, Groups $groups) {
    return view('groups', [
        'groups' => $groups->getGroups()
    ]);
})->name('groups');

Route::get('/resources', function (Request $request) {
    return view('resources', [
        //
    ]);
})->name('resources');

Route::get('/other', function (Request $request) {
    return view('other');
})->name('other');
