<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodTypeController;
use App\Http\Controllers\MealGroupController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServingQuantityController;
use App\Http\Controllers\ActivityController;

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
/***************************User Routes*********************************************/

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user/statistices', [UserController::class, 'getUserStatistices'])->name('user.statistices');
    Route::get('/user/count', [UserController::class, 'getNumberOfUsers'])->name('user.count');
    Route::get('/user/count/male', [UserController::class, 'getNumberOfMaleUsers'])->name('user.count.male');
    Route::get('/user/count/female', [UserController::class, 'getNumberOfFemaleUsers'])->name('user.count.female');
    Route::get('/user/count/obese', [UserController::class, 'getNumberOfObeseUsers'])->name('user.count.obese');
    Route::get('/user/count/thin', [UserController::class, 'getNumberOfThinUsers'])->name('user.count.thin');
    Route::get('/user/index', [UserController::class, 'getAllUsers'])->name('user.index');
    Route::get('/role/index', [RoleController::class, 'index'])->name('role.index');
});
Route::middleware(['auth:sanctum','role:manager'])->group(function () {
    Route::put('/user/changerole', [UserController::class, 'changeUserRole'])->name('user.changerole');
    Route::put('/user/block', [UserController::class, 'blockUser'])->name('user.block');
    Route::put('/user/unblock', [UserController::class, 'unblockUser'])->name('user.unblock');
});
Route::get('/user/hasrole', [UserController::class, 'checkIfHasRole'])->name('user.hasrole');
Route::post('/sanctum/token', [UserController::class, 'loginDashBoard'])->name('user.logindashboard');
Route::post('/sanctum/token/signup', [UserController::class, 'signup'])->name('user.signup');
Route::put('/editpersonalinfo', [UserController::class, 'editPersonalInfo'])->name('user.editPersonalInfo');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities');

/***************************************************************************************/
/***************************Food Routes**********************************************/
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/food/statistices', [FoodController::class, 'getFoodStatistices'])->name('food.statistices');
    Route::get('/food/count', [FoodController::class, 'getNumberOfFood'])->name('food.count');
    Route::get('/food/count/foodtype', [FoodController::class, 'getNumberOfFoodTypeFood'])->name('food.count.foodtypea');
    Route::get('/foodtype/index', [FoodTypeController::class, 'index'])->name('foodtype.index');
    Route::get('/food/index', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/servingquantity/index', [ServingQuantityController::class, 'index'])->name('food.servingquantity.index');
    Route::get('/food/item', [FoodController::class, 'getFoodItem'])->name('food.item');
    Route::get('/nutritionfact/item', [FoodController::class, 'getNutritionFact'])->name('food.nutritionfact');

});
Route::get('/food/search', [FoodController::class, 'search'])->name('food.search');

Route::middleware(['auth:sanctum','role:contentmanager'])->group(function () {
    Route::put('/food/edit', [FoodController::class, 'update'])->name('food.update');
    Route::post('/food/delete', [FoodController::class, 'destroy'])->name('food.delete');
    Route::put('/food/remove', [FoodController::class, 'remove'])->name('food.remove');
});
Route::post('/food/addtomeal', [FoodController::class, 'addToMeal'])->name('food.addtomeal');
Route::post('/food/create', [FoodController::class, 'store'])->name('food.store');

/***************************************************************************************/
/***************************Meal Group Routes**********************************************/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
    Route::get('/groupmeals', [MealGroupController::class, 'index'])->name('groupmeals.index');
    Route::delete('/groupmeals/delete', [MealGroupController::class, 'destroy'])->name('groupmeals.delete');
    Route::post('/groupmeals/create', [MealGroupController::class, 'create'])->name('groupmeals.create');
    Route::delete('/meals/delete', [MealController::class, 'destroy'])->name('meals.delete');
    Route::post('/meals/create', [MealController::class, 'create'])->name('meals.create');

});


/***************************************************************************************/



