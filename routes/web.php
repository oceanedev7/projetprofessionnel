<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\CabaneController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\MapController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('accueil');

Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');

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

Route::get('/contact&acces', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/réserver', function () {
    return view('pages.reserver');
})->name('reserver');

Route::get('/noscabanes', function () {
    return view('pages.cabanes.noscabanes');
})->name('noscabanes');

Route::get('/cabaneniddouillet', function () {
    return view('pages.cabanes.niddouillet');
})->name('cabane1');


Route::get('/cabaneosmose', function () {
    return view('pages.cabanes.osmose');
})->name('cabane2');

Route::get('/cabaneescapade', function () {
    return view('pages.cabanes.escapade');
})->name('cabane3');

Route::get('/cabaneeden', function () {
    return view('pages.cabanes.eden');
})->name('cabane4');


Route::get('/prestationsetservices', function () {
    return view('pages.prestations');
})->name('prestations');


Route::get('/admininfos', function () {
    return view('pages.admin.infos');
})->name('infos');

Route::get('/infos/cabanes', [CabaneController::class, 'index'])->name('afficherCabane');
Route::post('/infos/cabanes', [CabaneController::class, 'create'])->name('ajouterCabane');
Route::get('/infos/cabanes/delete/{id}', [CabaneController::class, 'destroy'])->name('supprimerCabane');
Route::get('/infos/cabanes/edit/{id}', [CabaneController::class,'edit'])->name('editerCabane');
Route::post('/infos/cabanes/update/{id}', [CabaneController::class,'updateTest'])->name('modifierCabane');

Route::post('/infos/equipements', [EquipementController::class, 'create'])->name('ajouterEquipement');
Route::get('/infos/equipements/delete/{id}', [EquipementController::class, 'destroy'])->name('supprimerEquipement');
Route::get('/infos/equipements/edit/{id}', [EquipementController::class,'edit'])->name('editerEquipement');
Route::post('/infos/equipements/update/{id}', [EquipementController::class,'update'])->name('modifierEquipement');

Route::post('/infos/prestations', [PrestationController::class, 'create'])->name('ajouterPrestation');
Route::get('/infos/prestations/delete/{id}', [PrestationController::class, 'destroy'])->name('supprimerPrestation');
Route::get('/infos/prestations/edit/{id}', [PrestationController::class,'edit'])->name('editerPrestation');
Route::post('/infos/prestations/update/{id}', [PrestationController::class,'update'])->name('modifierPrestation');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
