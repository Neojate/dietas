<?php

$options = [
    'module'        => 'Listas',
    'middleware'    => ['web', 'auth'],
    'namespace'     => 'App\Modules\Listas\Controllers'
];

Route::group($options, function() {
    Route::get('/listas', 'ListaController@index')->name('listas.index');
    Route::get('/listas/create', 'ListaController@create')->name('listas.create');
    Route::get('/listas/edit/{id}', 'ListaController@edit')->name('listas.edit');
    Route::post('/listas/store', 'ListaController@store')->name('listas.store');
    Route::post('/listas/update/{id}', 'ListaController@update')->name('listas.update');
    Route::get('/listas/delete/{id}', 'ListaController@delete')->name('listas.delete');

    Route::get('/products/create/{lista_id}', 'ProductController@create')->name('product.create');
    Route::get('/products/edit/{product_id}', 'ProductController@edit')->name('product.edit');
    Route::post('/products/store', 'ProductController@store')->name('product.store');
    Route::post('/products/update/{product_id}', 'ProductController@update')->name('product.update');
    Route::get('/products/delete/{product_id}', 'ProductController@delete')->name('product.delete');
});

