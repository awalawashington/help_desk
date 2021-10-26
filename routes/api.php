<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
@elseif(auth()->user()->course() !== NULL)
<h5 class="card-title">Course Information</h5>

<div class="row">
  <div class="col-lg-3 col-md-4 label ">Faculty</div>
  <div class="col-lg-9 col-md-8">{{auth()->user()->course->faculty}}</div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Department</div>
  <div class="col-lg-9 col-md-8">{{auth()->user()->course->department}}</div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Course</div>
  <div class="col-lg-9 col-md-8">{{auth()->user()->course->course}}</div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-4 label">Academic year</div>
  <div class="col-lg-9 col-md-8">{{auth()->user()->course->year}}.{{auth()->user()->course->semister}}</div>
</div>
*/