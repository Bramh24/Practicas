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

//RUTA PARA ACCESAR A UN CONTROLADOR QUE INVOCA A UN MODELO LLAMADO CATEGORIA
Route::get('categoria', 'CategoriaController@index');
//RUTA PARA ACCESAR A UN METODO STORE DEL CONTROLADOR "CATEGORIACONTROLLER"
Route::post('categoria/registrar', 'CategoriaController@store');
//RUTA PARA ACCESAR A UN METODO UPDATE DEL CONTROLADOR "CATEGORIACONTROLLER"
Route::put('categoria/actualizar', 'CategoriaController@update');
//RUTA PARA ACTIVAR REGISTRO A PARTIR DEL METODO ACTIVAR DEL CONTROLADOR "CATEGORIACONTROLLER"
Route::put('categoria/activar', 'CategoriaController@activar');
//RUTA PARA DESACTIVAR REGISTRO A PARTIR DEL METODO ACTIVAR DEL CONTROLADOR "CATEGORIACONTROLLER"
Route::put('categoria/desactivar', 'CategoriaController@desactivar');

Route::get('categoria/selectCategoria', 'CategoriaController@selectCategoria');
Route::get('categoria/listarPdf','CategoriaController@listarPdf')->name('categorias_pdf');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', function () {
    return view('contenido/contenido');
});

// EJEMPLOS DE RUTAS
Route::get('/usr', function () {
    return 'Mostrando datos del usuario: '.$_GET['id'];
});


Route::get('/usr2/{id}', function ($id) {
    return "Mostrando resultados del usuario:  {$id}";
    // se debera de manera limpia: http://127.0.0.1:8000/usr2/5
})->where ('id','[0-9]+');


//con dos parametros
Route::get('/saludo/{name}/{nickname?}', function ($name, $nickname=nullx) {
    if($nickname){
        return "Bienvenido: {$name}, tu nickname es $nickname";
    }else{
        return "Bienvenido: {$name}, no tienes apodo";
    }

});
