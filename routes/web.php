<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', [TicketController::class, 'showForm'])->name('ticket.form');
Route::post('/', [TicketController::class, 'submitForm'])->name('ticket.submit');
