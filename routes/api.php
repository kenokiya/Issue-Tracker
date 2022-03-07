<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\ProblemsController;
use App\Http\Controllers\Api\SolutionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\Admin\AllProblemsSolutionsController;
use App\Http\Controllers\Api\Admin\UserController;

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

//Register route api
Route::post('register', [ApiAuthcontroller::class, 'register']);

//Login route api
Route::post('login', [ApiAuthcontroller::class, 'login']);

//Logout route api
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout', [ApiAuthcontroller::class, 'logout']);
});

//forgort password route api
Route::post('forgort-password', [ApiAuthcontroller::class, 'forgortPassword']);

//Reset password route api
Route::post('update-password', [ApiAuthcontroller::class, 'resetPassword']);

//Admin routes api
Route::middleware(['auth:sanctum', 'isApiAdmin'])->group(function(){
    Route::get('checkingAuthenticated', function () {
        return response()->json(['message'=>'You are in', 'status'=>200], 200);
    });

    //Get all problems raised route api
    Route::get('get-all-problems', [AllProblemsSolutionsController::class, 'problems']);

    //Get all solutions to a perticular problem route api
    Route::get('get-all-solutions/{problem_id}', [AllProblemsSolutionsController::class, 'solutions']);
   
    //get solved problems
    Route::get('get-solvedProblems', [AllProblemsSolutionsController::class, 'solvedProblems']);

    //get unsolved solved problems
    Route::get('get-unsolvedProblems', [AllProblemsSolutionsController::class, 'unsolvedProblems']);

    //post service
    Route::post('post-service', [ServiceController:: class, 'store']);

    //get services analysis
    Route::get('service-analysis', [AllProblemsSolutionsController::class, 'serviceAnalysis']);

    //View users account route api
    Route::get('get-users', [UserController::class, 'index']);

    //View Single user accout route api
    Route::get('get-user/{username}', [UserController::class, 'edit']);

    //Activate or dectivate users account route api
    Route::put('change-user-status/{id}', [UserController::class, 'update']);

    //Delete user account route api
    Route::delete('delete-user/{id}', [UserController::class, 'destroy']);

});

//Normal user routes api

//Get all services route api
Route::get('get-services', [ServiceController::class, 'index']);

//Get all raised problems
Route::get('get-problems', [ProblemsController::class, 'index']);

//Get my problems
Route::get('my-problems', [ProblemsController::class, 'myProblems']);

//Get problems i am tagged
Route::get('tagged-problems', [ProblemsController::class, 'taggedProblems']);

//Get my solved problems route Api
Route::get('my-solved-problems', [ProblemsController::class, 'solvedProblems']);

//Get my unsolved problems route api
Route::get('my-unsolved-problems', [ProblemsController::class, 'unsolvedProblems']);

//post a problem api
Route::post('post-problem', [ProblemsController::class, 'store']);

//Show particular problems route api
Route::get('get-problem/{id}', [ProblemsController::class, 'show']);

//User taging route api
Route::get('get-all-users', [ProblemsController::class, 'allUsers']);

//Show all solution in a particular problem api
Route::get('get-solutions/{problem_id}', [SolutionController::class, 'index']);

//Post a solution to a particular problem
Route::post('post-solution/{problem_id}', [SolutionController::class, 'store']);

//filter problem by date & service route api
Route::get('filter-problem/{date}/{service_name}', [FilterController::class, 'filterProblems']);