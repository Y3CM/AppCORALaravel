<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');

Route::get('/verificarPosts',[PostController::class,'verificarPosts'])->name('verificar.posts');

Route::get('/publicados',[PostController::class,'publicados'])->name('publicados');

Route::get('/crear',[CategoryController::class,'create'])->name('categoria.create');

Route::get('/categorias',[CategoryController::class,'indexAdmin'])->name('categorias.index');

Route::get('/categorias/{id}/editar',[CategoryController::class,'edit'])->name('categorias.edit');



