<?php

$options = [
    'module'        => 'Historial',
    'middleware'    => ['web', 'auth'],
    'namespace'     => 'App\Modules\Historial\Controllers'
];

Route::group($options, function() {
    Route::get('/historial', 'HistorialController@index')->name('historial.index');
});
