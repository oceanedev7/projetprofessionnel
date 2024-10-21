<?php

use App\Http\Controllers\AvailableRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CabaneController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\CabaneViewController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\PrestationViewController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\ExtrasController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ValidateClientController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('accueil')->middleware(\App\Http\Middleware\Localisation::class);

Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu')->middleware(\App\Http\Middleware\Localisation::class);

Route::get('/mentionslegales', function () {
    return view('pages.footer.mentionslegales');
})->name('mentionslegales');

Route::get('/conditionsgeneralesdevente', function () {
    return view('pages.footer.conditionsvente');
})->name('cgv');

Route::get('/confidentialite', function () {
    return view('pages.footer.confidentialite');
})->name('confidentialite');

Route::get('/plandusite', function () {
    return view('pages.footer.plandusite');
})->name('plandusite');

Route::get('/faq', function () {
    return view('pages.footer.faq');
})->name('faq');

// Route::get('/contact&acces', function () {
//     return view('pages.contact');
// })->name('contact')->middleware(\App\Http\Middleware\Localisation::class);

Route::get('/réserver', function () {
    return view('pages.reserver');
})->name('reserver');

Route::get('/noscabanes', function () {
    return view('pages.cabanes.noscabanes');
})->name('noscabanes')->middleware(\App\Http\Middleware\Localisation::class);


Route::get('/cabaneniddouillet', [CabaneViewController::class, 'showCabaneNidDouillet'])->name('cabane1')->middleware(\App\Http\Middleware\Localisation::class);
Route::get('/cabaneosmose', [CabaneViewController::class, 'showCabaneOsmose'])->name('cabane2')->middleware(\App\Http\Middleware\Localisation::class);
Route::get('/cabaneescapade', [CabaneViewController::class, 'showCabaneEscapade'])->name('cabane3')->middleware(\App\Http\Middleware\Localisation::class);
Route::get('/cabaneeden', [CabaneViewController::class, 'showCabaneEden'])->name('cabane4')->middleware(\App\Http\Middleware\Localisation::class);

Route::get('/prestations', [PrestationViewController::class, 'showPrestations'])->name('prestations')->middleware(\App\Http\Middleware\Localisation::class);

// Route::post('/reservation/cabanes/disponibilite', [AvailableRoomController::class, 'store'])->name('disponibilite');
Route::match(['get', 'post'], '/reservation/cabanes/disponibilite', [AvailableRoomController::class, 'store'])->name('disponibilite');

Route::match(['get', 'post'], '/reservation/extras', [ExtrasController::class, 'index'])->name('extras');

// Route::post('/reservation/extras', [ExtrasController::class, 'index'])->name('extras');

Route::match(['get', 'post'], '/reservation/informations/client', [ClientInfoController::class, 'store'])->name('info-client');

// Route::match(['get', 'post'], '/reservation/validate/client', [ClientInfoController::class, 'create'])->name('validate-client');

Route::post('/reservation/validate/client', [ValidateClientController::class, 'create'])->name('validate-client');

Route::get('/reservation/paiement', function () {
    return view('pages.paiement');
})->name('resa-payment');

Route::get('/reservation/confirmation', function () {
    return view('pages.resa-confirmed');
})->name('confirmed');


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');



Route::get('/admin/cabanes', [CabaneController::class, 'index'])->name('afficherCabane');
Route::post('/cabanes/create', [CabaneController::class, 'create'])->name('ajouterCabane');
Route::get('/cabanes/delete/{id}', [CabaneController::class, 'destroy'])->name('supprimerCabane');
Route::get('/cabanes/edit/{id}', [CabaneController::class,'edit'])->name('editerCabane');
Route::post('/cabanes/update/{id}', [CabaneController::class,'update'])->name('modifierCabane');

Route::get('/admin/equipements', [EquipementController::class, 'index'])->name('afficherEquipement');
Route::post('/equipements/create', [EquipementController::class, 'create'])->name('ajouterEquipement');
Route::get('/equipements/delete/{id}', [EquipementController::class, 'destroy'])->name('supprimerEquipement');
Route::get('/equipements/edit/{id}', [EquipementController::class,'edit'])->name('editerEquipement');
Route::post('/equipements/update/{id}', [EquipementController::class,'update'])->name('modifierEquipement');

Route::get('/admin/prestations', [PrestationController::class, 'index'])->name('afficherPrestation');
Route::post('/prestations/create', [PrestationController::class, 'create'])->name('ajouterPrestation');
Route::post('/category/create', [PrestationController::class, 'createCategory'])->name('ajouterCategorie');
Route::get('/prestations/delete/{id}', [PrestationController::class, 'destroy'])->name('supprimerPrestation');
Route::get('/prestations/edit/{id}', [PrestationController::class,'edit'])->name('editerPrestation');
Route::post('/prestations/update/{id}', [PrestationController::class,'update'])->name('modifierPrestation');

Route::get('/newsletter', [NewsletterController::class, 'index'])->name('afficherEmails');
Route::get('/newsletter/delete/{id}', [NewsletterController::class, 'destroy'])->name('supprimerEmail');
Route::post('/newsletter/inscription', [NewsletterController::class,'create'])->name('ajouterNewsletter');

Route::post('/demandecontact', [ContactRequestController::class, 'store'])->name('contact-request');
Route::get('/contact&acces', [ContactRequestController::class, 'index'])->name('contact')->middleware(\App\Http\Middleware\Localisation::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
