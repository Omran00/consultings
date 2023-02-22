<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\Chat\ChatMessageController;
use App\Http\Controllers\Appointment\BookedController;
use App\Http\Controllers\Appointment\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Expert\UpdateExpertController;
use App\Http\Controllers\Consulting\ConsultingController;
use App\Http\Controllers\Expert\ExpertRegisterController;
use App\Http\Controllers\Favorite\AddToFavoriteController;
use App\Http\Controllers\Favorite\DeleteFavoriteController;
use App\Http\Controllers\Favorite\GetFavoriteController;
use App\Http\Controllers\PhoneNumber\CreatePhoneNumberController;
use App\Http\Controllers\PhoneNumber\DeletePhoneNumberController;
use App\Http\Controllers\PhoneNumber\UpdatePhoneNumberController;
use App\Http\Controllers\User\ProfileController;

Route::post('/register', [SignupController::class, 'signup']);
Route::post('/login',    [LoginController::  class, 'login']);

Route::group(['middleware' => ['auth:api', 'expert', 'expert_data']], function()
{
    //Expert
    Route::post  ('/update_expert',[UpdateExpertController::class,'update']);
    //Appointment
    Route::get   ('/booked_appointments',            [BookedController::class, 'expert_booked_appointments']);
    //Phone Number
    Route::post  ('/phone_numbers',                  [CreatePhoneNumberController::class, 'create']);
    Route::put   ('/phone_number/{phone_number_id}', [UpdatePhoneNumberController::class, 'update']);
    Route::delete('/phone_number/{phone_number_id}', [DeletePhoneNumberController::class, 'destroy']);
});

Route::group(['middleware' => ['auth:api', 'expert_data']], function()
{
    //Consiltings
    Route::get('/consultings',[ConsultingController::class,'index']);

    //Appointments
    Route::post('/book_appointment/{expert_id}', [BookingController::class, 'book_appointment']);
    Route::get ('/user_booked_appointments',     [BookedController:: class, 'user_booked_appointments']);

    //Favorites
    Route::get   ('/favorites',            [GetFavoriteController::class, 'get_favorite_experts']);
    Route::post  ('/favorite/{expert_id}', [AddToFavoriteController::class, 'add_to_favorite']);
    Route::delete('/favorite/{expert_id}', [DeleteFavoriteController::class, 'delete_favorite_expert']);
    
    // User
    Route::get ('/user_profile',[ProfileController::   class,'user_profile']);
    Route::post('/update_user', [UpdateUserController::class, 'update']);
    Route::delete('/delete_user', [DeleteUserController::class, 'delete']);

    //chats
    Route::get ('/chats', [ChatController::class, 'index']);
    Route::post('/chats', [ChatController::class, 'store']);
    //messages
    Route::get ('/messages', [ChatMessageController::class, 'index']);
    Route::post('/messages', [ChatMessageController::class, 'store']);


});

Route::group(['middleware' => ['auth:api', 'expert']], function()
{
    Route::post('/expert', [ExpertRegisterController::class, 'register']);
    Route::post('/logout', [LogoutController::        class, 'logout']);
});
