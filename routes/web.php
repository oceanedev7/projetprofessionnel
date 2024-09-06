<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CabaneController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\CabaneViewController;
use App\Http\Controllers\PrestationViewController;
use App\Http\Controllers\ContactRequestController;


use App\Http\Controllers\MapController;

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


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// Route::get('/admininfos', function () {
//     return view('pages.admin.infos');
// })->name('infos');


Route::get('/infos/cabanes', [CabaneController::class, 'index'])->name('afficherCabane');
Route::post('/infos/cabanes', [CabaneController::class, 'create'])->name('ajouterCabane');
Route::get('/infos/cabanes/delete/{id}', [CabaneController::class, 'destroy'])->name('supprimerCabane');
Route::get('/infos/cabanes/edit/{id}', [CabaneController::class,'edit'])->name('editerCabane');
Route::post('/infos/cabanes/update/{id}', [CabaneController::class,'update'])->name('modifierCabane');

Route::post('/infos/equipements', [EquipementController::class, 'create'])->name('ajouterEquipement');
Route::get('/infos/equipements/delete/{id}', [EquipementController::class, 'destroy'])->name('supprimerEquipement');
Route::get('/infos/equipements/edit/{id}', [EquipementController::class,'edit'])->name('editerEquipement');
Route::post('/infos/equipements/update/{id}', [EquipementController::class,'update'])->name('modifierEquipement');

Route::post('/infos/prestations', [PrestationController::class, 'create'])->name('ajouterPrestation');
Route::get('/infos/prestations/delete/{id}', [PrestationController::class, 'destroy'])->name('supprimerPrestation');
Route::get('/infos/prestations/edit/{id}', [PrestationController::class,'edit'])->name('editerPrestation');
Route::post('/infos/prestations/update/{id}', [PrestationController::class,'update'])->name('modifierPrestation');


Route::get('/newsletter', [NewsletterController::class, 'index'])->name('afficherEmails');
Route::get('/newsletter/delete/{id}', [NewsletterController::class, 'destroy'])->name('supprimerEmail');
Route::post('/newsletter/inscription', [NewsletterController::class,'create'])->name('ajouterNewsletter');

// Route::get('/formulaire', [FormulaireController::class,'index'])->name('afficherFormulaire');
// Route::post('/formulaire', [FormulaireController::class,'create'])->name('ajouterFormulaire');
// Route::get('/formulaire/delete/{id}', [FormulaireController::class,'destroy'])->name('supprimerFormulaire');

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
