<?php

// Rota do Painel
Route::resource('/painel/produtos', 'Painel\ProdutoController');



// Rota do site
Route::get('/', 'Site\SiteController@index');

