<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ticket', [TicketController::class, 'showForm'])->name('ticket.form');
Route::post('/ticket', [TicketController::class, 'submitForm'])->name('ticket.submit');
