<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FranchiseApplicationController;


Route::post('/franchise-applications', [FranchiseApplicationController::class, 'store']);