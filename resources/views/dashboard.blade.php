<x-app-layout>
    {{-- <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> 
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-col space-y-8 ">
            <a href="{{route('afficherCabane')}}"  class=" flex items-center justify-between bg-white border border-2 border-custom-marron dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-custom-marron dark:text-gray-100 flex space-x-4">
                    <i class="fas fa-house-user text-lg"></i>
                   <div class="text-lg font-bold"> Gérer les cabanes </div>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl relative right-8"></i>
            </a>

            <a href="{{route('afficherEquipement')}}"  class=" flex items-center justify-between bg-white border border-2 border-custom-marron dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-custom-marron dark:text-gray-100 flex space-x-4">
                    <i class="fas fa-bed text-lg"></i>
                   <div class="text-lg font-bold"> Gérer les équipements </div>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl relative right-8"></i>
            </a>


            <a href="{{route('afficherPrestation')}}"  class=" flex items-center justify-between bg-white border border-2 border-custom-marron dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-custom-marron dark:text-gray-100 flex space-x-4">
                    <i class="fa-solid fa-utensils text-lg"></i>
                   <div class="text-lg font-bold"> Gérer les prestations </div>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl relative right-8"></i>
            </a>


            <a href="{{route('afficherEmails')}}"  class=" flex items-center justify-between bg-white border border-2 border-custom-marron dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-custom-marron dark:text-gray-100 flex space-x-4">
                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                   <div class="text-lg font-bold"> Voir les inscriptions à la newsletter </div>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl relative right-8"></i>
            </a>

            <a  href="https://mail.google.com/mail/u/3/?ogbl#inbox" target="_blank" class=" flex items-center justify-between bg-white border border-2 border-custom-marron dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-custom-marron dark:text-gray-100 flex space-x-4">
                    <i class="fa-solid fa-envelope text-lg"></i>
                   <div class="text-lg font-bold"> Voir les demandes de contact </div>
                </div>
                <i class="fa-solid fa-arrow-right text-2xl relative right-8"></i>
            </a>
        </div>
    </div>
</x-app-layout>
