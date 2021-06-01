<?php

$options = [
    'module'        => 'Compras',
    'middleware'    => ['web', 'auth'],
    'namespace'     => 'App\Modules\Compras\Controllers'
];

Route::group($options, function() {
    Route::get('/compras', 'ComprarController@index')->name('compras.index');
    Route::get('/compras/edit/{id}', 'ComprarController@create')->name('compras.create');
    Route::post('compras/store', 'ComprarController@store')->name('compras.store');
});
