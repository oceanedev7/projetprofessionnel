<div> Bonjour </div>

<div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center">
    <div> {{ session('nomCabane') }}</div>
    <div> - </div>
    <div> {{ session('nombreEnfants') }} pers. </div>
    {{ session('nombreAdultes') }}
</div>

<div class="flex text-custom-marron space-x-3 justify-center">
    <i class="fa-solid fa-mug-saucer mt-1"></i>
    <div class="text-sm">Petit-déjeuner inclus</div>
</div>

<div class="flex flex-col mt-8 space-y-4">
    <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Date d'arrivée :</label>
        <div class="font-semibold text-custom-marron">{{ \Carbon\Carbon::parse(session('dateArrivee'))->format('d/m/Y') }}</div>
    </div>

    <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Date de départ :</label>
        <div class="font-semibold text-custom-marron">{{ \Carbon\Carbon::parse(session('dateDepart'))->format('d/m/Y') }}</div>
    </div>

    <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Durée :</label>
        <div class="font-semibold text-custom-marron">{{ session('nombreNuitees') }} nuit(s)</div>
    </div>

    <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Nombre de pers. :</label>
        <div class="flex flex-col">
            <div class="flex space-x-2">
                <label class="text-custom-marron text-sm mt-1">Adultes :</label>
                <div class="font-semibold text-custom-marron mt-0.5">{{ session('nombreAdultes') }}</div>
            </div>
            <div class="flex space-x-2">
                <label class="text-custom-marron text-sm mt-1">Enfants :</label>
                <div class="font-semibold text-custom-marron mt-0.5">{{ session('nombreEnfants') }}</div>
            </div>
        </div>
    </div>
</div>
