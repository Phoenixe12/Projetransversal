<?php

use App\Http\Controllers\Entreprise\AccueilController;
use App\Http\Controllers\Entreprise\CommandeEntrepriseController;
use App\Http\Controllers\Fournisseur\CommandeFournisseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Entreprise\InformationEntrepriseController;
use App\Http\Controllers\Entreprise\MessageEntrepriseController;
use App\Http\Controllers\Entreprise\PaninerController;
use App\Http\Controllers\Entreprise\ProduitEntrepriseController;
use App\Http\Controllers\Fournisseur\StockFournisseurController;
use App\Http\Controllers\Fournisseur\InformationFournisseurController;
use App\Http\Controllers\Fournisseur\MessageFournisseurController;
use App\Http\Controllers\Fournisseur\ProduitController;
use App\Http\Controllers\VerificationOptController;
use App\Http\Middleware\CheckEmailVerified;
use App\Http\Middleware\InfoEntreprisesMiddleware;
use App\Http\Middleware\InfournisseursMiddleware;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');
Auth::routes();
// User Route
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class,'userHome'])->name('home');
});

// Entreprise Route
Route::middleware(['auth', 'user-role:editor',InfoEntreprisesMiddleware::class,CheckEmailVerified::class])->group(function () {
     //DASHBORD
    Route::get("/editor/home", [HomeController::class, 'editorHome'])->name('home.editor');
});



// 
Route::middleware(['auth', 'user-role:admin'])->group(function()
{
 Route::get("/admin/home", [HomeController::class, 'adminHome'])->name('home.admin');

});

//Middelwar auth

Route::middleware(['auth'])->group(function () {

    //Verification OTP
    Route::get('/verification/code', [VerificationOptController::class, 'showVerificationForm'])->name('verification.code');
    Route::post('/verification/verify', [VerificationOptController::class, 'verifyCode'])->name('verification.verify');
    Route::post('/resendOTP', [VerificationOptController::class, 'resendOTP'])->name('resendOTP');


    //Entreprise
    Route::get("/Entreprise/code", [InformationEntrepriseController::class, 'index'])->name('Entreprise.code');
    Route::post("/Entreprise/store", [InformationEntrepriseController::class, 'store'])->name('Entreprise.store');

});
