<?php
use Illuminate\Support\Facades\Route;
use Ales0sa\WebPortfolio\Http\Controllers\ShowcaseController;

Route::get('/create',		[ShowcaseController::class, 'create'])->name('webs.create')->middleware('auth');
Route::get('/', 			[ShowcaseController::class, 'index'])->name('webs.index');
Route::get('/list', 		[ShowcaseController::class, 'list'])->name('webs.list');
Route::delete('/{id}',		[ShowcaseController::class, 'destroy'])->name('webs.destroy');
Route::get('/webs/{post}',  [ShowcaseController::class, 'show'])->name('webs.show');
Route::put('/webs', 		[ShowcaseController::class, 'store'])->name('webs.store')->middleware('auth');