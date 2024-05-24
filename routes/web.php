<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\QuestioningController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InformationController;
use App\Models\Activity;
use App\Http\Controllers\SolUploadController;

// Language Routes
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change/{locale}', [LangController::class, 'change'])->name('changeLang');

// Public Routes
Route::get('/get-activities/{country}', function (Request $request, $country) {
    $activities = Activity::where('id_countries', $country)->pluck('name', 'id');
    return response()->json(['activities' => $activities]);
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

// Authenticated Routes
#Route::middleware(['auth'])->group(function () {
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [BiddingController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [BiddingController::class, 'index']);

    //bidding
    Route::get('/bidding/{id}', [BiddingController::class, 'show'])->name('bidding.details');
    Route::get('/bidding/{id}/links', [BiddingController::class, 'showLinks'])->name('bidding.links');
    Route::get('/bidding/{id}/details', [BiddingController::class, 'show'])->name('bidding.details.details');
    Route::get('/bidding/{id}', [BiddingController::class, 'show'])->name('bidding.details');
    //Quetion
    Route::post('/send-question', [QuestioningController::class, 'sendQuestion'])->name('send.question');

    // Participate
    Route::post('/participate', [ParticipationController::class, 'participate'])->name('participate');

    // Upload de documentos
    Route::post('/upload', [FileUploadController::class, 'storeUploads'])->name('upload.store');
    Route::get('/document/view/{id}', [FileUploadController::class, 'view'])->name('document.view');
    Route::delete('/document/delete/{id}', [FileUploadController::class, 'destroy'])->name('document.delete');

    // Upload de solicitacao

    Route::post('/uploadSol', [SolUploadController::class, 'storeUploads'])->name('uploadSol.store');
    Route::get('/solicitacao/view/{id}', [SolUploadController::class, 'view'])->name('information.view');
    Route::delete('/solicitacao/delete/{id}', [SolUploadController::class, 'destroy'])->name('information.delete');

    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');






     // Rota para exibir o perfil (GET)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Rota para atualizar o perfil (POST)
    Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    // Rota para exibir o formulário de alteração de senha (GET)
    Route::post('/profile/password/{user}', [ProfileController::class, 'updatePassword'])->name('profile.password.update');



    //password
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change.password.update');


});

//Pagination Route
Route::get('{locale?}/user-pagination', function () {
    return view('default');
})->where('locale', 'pt|es|en');

// Fallback Route for 404 Error
Route::fallback(function () {
    return view('errors.404');
});
