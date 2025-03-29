<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/s/{shortcut}', function ($shortcut) {

    $urls = config('shortcuts.urls');

    if (array_key_exists($shortcut, $urls)) {
        return redirect()->away($urls[$shortcut]);
    }

    abort(404);

});

