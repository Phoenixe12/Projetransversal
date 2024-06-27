<?php

use App\Http\Controllers\Admin\BioBanqueController;
use App\Http\Controllers\Admin\CompteController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EntrepriseController;
use App\Http\Controllers\Admin\ListeEntrepriseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\EchantillonController;
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
Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get("/home", [HomeController::class, 'userHome'])->name('home');
});

// Entreprise Route
Route::middleware(['auth', 'user-role:editor', InfoEntreprisesMiddleware::class, CheckEmailVerified::class])->group(function () {
    //DASHBORD
    Route::get("/editor/home", [HomeController::class, 'editorHome'])->name('home.editor');

    Route::resource('/Gestion+Echantillon', EchantillonController::class);
    Route::get('/Gestion+Echantillon+getAll', [EchantillonController::class, 'getAll'])->name('getAll.index');
    Route::get('/Gestion+Echantillon/edit/{id}', [EchantillonController::class, 'edit'])->name('gestionEchantillon.edit');
    Route::put('/update+Echantillon', [EchantillonController::class, 'update'])->name('update-Echantillon');
    Route::delete("/delete+Echantillon", [EchantillonController::class, 'destroy'])->name('delete-Echantillon');
});



//
Route::middleware(['auth', 'user-role:admin'])->group(function () {

    Route::get("/admin/home", [HomeController::class, 'adminHome'])->name('home.admin');
    Route::resource("/Gestion+Profil", ProfileController::class);
    Route::put('/Profil', [ProfileController::class, 'update'])->name('update-profile');
    Route::put('/User/Profil', [ProfileController::class, 'userInformation'])->name('user-profile-information.update');
    Route::put('/Password', [ProfileController::class, 'updatePassword'])->name('user-password.update');

    Route::resource("/Gestion+Compte", CompteController::class);
    Route::get('/Gestion+Compte/edit/{id}', [CompteController::class, 'edit'])->name('gestionCompte.edit');
    Route::put('/Compte+Produit', [CompteController::class, 'update'])->name('update-Compte');
    Route::delete("/delete+Compte", [CompteController::class, 'destroy'])->name('delete-Compte');


    Route::resource('/Gestion+Country', CountryController::class);
    Route::get('/Gestion+Country/edit/{id}', [CountryController::class, 'edit'])->name('gestionCountry.edit');
    Route::put('/update+Country', [CountryController::class, 'update'])->name('update-Country');
    Route::delete("/delete+Country", [CountryController::class, 'destroy'])->name('delete-Country');



    Route::resource('/Gestion+BioBanque+Admin', BioBanqueController::class);
    Route::get('/Gestion+BioBanque/edit/{id}', [BioBanqueController::class, 'edit'])->name('gestionBioBanque.edit');
    Route::put('/update+BioBanque', [BioBanqueController::class, 'update'])->name('update-BioBanque');
    Route::delete("/delete+BioBanque", [BioBanqueController::class, 'destroy'])->name('delete-BioBanque');


    Route::resource('/Information+Entreprise', ListeEntrepriseController::class);
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
