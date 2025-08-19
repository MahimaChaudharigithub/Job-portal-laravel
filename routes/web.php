<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs;
//use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Log;

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

Route::get('/login', [Jobs::class, 'login_view'])->name('login');
Route::get("/register",[Jobs::class,'register'])->name('register');
Route::post('/save_login', [Jobs::class, 'login'])->name('savelogin');
Route::get('/', [Jobs::class, 'showDashboard'])->name('dashboard');
Route::get('/jobs_post',function(){
    if (session()->has('user_name')) {
        return view('jobs');
    } else {
        session()->flash('error', 'Please log in to continue.');
        return redirect()->route('login'); // Redirect to login page if not authenticated
    }
})->name('job_post');

Route::post('/saveregister',[Jobs::class,'saveAddclient'])->name('save');

Route::post('/job_store',[Jobs::class, 'save_jobs'])->name('jobs.store');
Route::get('/logout',[Jobs::class, 'logout'])->name('logout');

Route::get('/deleteJob/{id}',[Jobs::class,'deleteJob'])->name('deletejob');

Route::get('/showdetails/{id}', [Jobs::class, 'show_detail'])->name('showdetails');
Route::get('/edit_details/{id}',[Jobs::class,'edit_job'])->name('edit_job');
Route::post('/apply', [Jobs::class, 'apply'])->name('applyjob');
Route::get('/appliedjobs',[Jobs::class,'appliedjobs'])->name('appliedjobs');

// routes/web.php
Route::get('/filter-jobs', [Jobs::class, 'filterjob'])->name('filter.jobs');
Route::get('/Jobs/viewApplied/{id}', [Jobs::class, 'viewApplied'])->name('viewApplied');

  

?>