@extends('layouts.cgv')

@section('title', 'FAQ')

 @section ('titre')

           <div class="flex flex-col h-screen text-white text-justify items-center relative ">
            <h1 class="text-5xl text-white font-bold relative top-24 left-16">Questions & Réponses</h1>
            <hr class="border-t-4 border-custom-beige w-72 relative top-28 left-20">
        
            <!-- FAQ Container -->
            <div class=" max-w-xl flex-1 px-4 relative left-16 top-40 ">
                <div id="accordion-flush" class="space-y-6" data-accordion="collapse" data-active-classes="bg-custom-vert dark:bg-gray-900 text-custom-beige dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
        
                    <!-- Question 1 -->
                    <div class="border border-custom-vert rounded-lg space-y-2">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                                <span class="text-lg">Y a-t-il des activités disponibles sur place ?  </span>
                                <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class=" bg-custom-vert text-white">
                                <p class="mb-2 break-normal">Oui, nous proposons une variété d'activités en plein air telles que la randonnée, le vélo, l'observation de la faune et la détente dans notre espace bien-être (selon la disponibilité).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="border border-custom-vert rounded-lg space-y-2">
                        <h2 id="accordion-flush-heading-2">
                            <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                                <span class="text-lg ">Puis-je amener mon animal de compagnie ?</span>
                                <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-1">
                            <div class=" bg-custom-vert text-white">
                                <p class="mb-2 break-normal">Malheureusement, nous ne pouvons pas accueillir les animaux de compagnie dans nos cabanes pour des raisons de sécurité et de confort des autres clients.
                                </p>
                            </div>
                        </div>
                    </div>
        <!-- Question 3 -->
        <div class="border border-custom-vert rounded-lg space-y-2">
            <h2 id="accordion-flush-heading-3">
                <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                    <span class="text-lg"> À quelle heure puis-je arriver et partir ?</span>
                    <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class=" bg-custom-vert text-white">
                    <p class="mb-2 break-normal">L’arrivée se fait à partir de 16h et jusqu'à 18h et le départ jusqu'à 11H. Ceci dit, 
                        les heures d'arrivée et de départ peuvent être ajustées sur demande. Veuillez nous contacter pour organiser votre arrivée et votre départ.
                    </p>
                </div>
            </div>
        </div>
                    <!-- Question 4 -->
        <div class="border border-custom-vert rounded-lg space-y-2">
            <h2 id="accordion-flush-heading-4">
                <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                    <span class="text-lg"> Comment puis-je accéder aux cabanes ?</span>
                    <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class=" bg-custom-vert text-white">
                    <p class="mb-2 break-normal">Nos cabanes sont accessibles à pied, mais certaines peuvent nécessiter une courte randonnée pour y accéder. Nous vous fournirons toutes les informations nécessaires lors de votre réservation.

                    </p>
                </div>
            </div>
        </div>
        
         <!-- Question 5 -->
         <div class="border border-custom-vert rounded-lg space-y-2">
            <h2 id="accordion-flush-heading-5">
                <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all text-left" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                    <span class="text-lg break-words ">Les cabanes sont-elles adaptées pour les personnes à mobilité réduite ?</span>
                    <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class="bg-custom-vert text-white">
                    <p class=" pl-4 break-words">Oui, nos cabanes sont accessibles aux personnes à mobilité réduite.</p>
                </div>
            </div>
        </div>

        <!-- Question 6 -->
        <div class="border border-custom-vert rounded-lg space-y-2">
            <h2 id="accordion-flush-heading-6">
                <button type="button" class="flex items-center justify-between font-medium text-white dark:text-gray-400 hover:bg-custom-vert transition-all" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                    <span class="text-lg">Avez-vous des offres spéciales ou des forfaits disponibles ?</span>
                    <svg data-accordion-icon class="w-4 h-4 transition-transform duration-300 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class=" bg-custom-vert text-white">
                    <p class="mb-2 break-normal">Nous proposons régulièrement des offres spéciales et forfaits thématiques. Suivez-nous pour découvrir nos dernières offres.</p>
                </div>
            </div>
        </div>

                </div>
            </div>
        
            
        </div>
        
    @endsection 
     

