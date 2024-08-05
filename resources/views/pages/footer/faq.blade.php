@extends('layouts.cgv')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tout Là-Haut</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

 @section ('titre')


<div class="flex flex-col h-screen text-white text-justify relative   " >
           <h1 class="  text-5xl text-white font-bold w-full "> Questions <br/> & Réponses </h1>
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-custom-vert dark:bg-gray-900 text-gray-900 text-custom-beige dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                        <span class="text-lg">Quels types de cabanes proposez-vous ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div>
                        <p class="mb-2 text-white">Nous proposons différents types de cabanes en bois perchées chacune offrant une expérience unique en harmonie avec la nature.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                        <span class="text-lg ">Quels équipements proposez-vous dans les cabanes ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div>
                        <p class="mb-2 text-white">Nos cabanes sont équipées de lits confortables, d'un espace de rangement, d'une salle de bains privative (selon le type de cabane) et d'une terrasse offrant une vue imprenable sur les environs.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                        <span class="text-lg">Y a-t-il des activités disponibles sur place ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div>
                        <p class="mb-2 text-white">Oui, nous proposons une variété d'activités en plein air telles que la randonnée, le vélo, l'observation de la faune et la détente dans notre espace bien-être (selon la disponibilité).</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-4">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                        <span class="text-lg">Comment réserver un séjour dans une cabane ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                    <div>
                        <p class="mb-2 text-white">Vous pouvez réserver votre séjour en ligne via notre site web ou en nous contactant par téléphone ou par e-mail. Assurez-vous de vérifier la disponibilité pour les dates souhaitées.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-5">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                        <span class="text-lg">Acceptez-vous les animaux de compagnie ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                    <div>
                        <p class="mb-2 text-white">Malheureusement, nous ne pouvons pas accueillir les animaux de compagnie dans nos cabanes pour des raisons de sécurité et de confort des autres clients.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-6">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                        <span class="text-lg">Quelle est votre politique d'annulation ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-6" class="hidden" aria-labelledby="accordion-flush-heading-6">
                    <div>
                        <p class="mb-2 text-white">Les conditions d'annulation varient en fonction du type de réservation. Veuillez consulter nos conditions générales de vente ou nous contacter directement pour plus d'informations.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-7">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                        <span class="text-lg">À quelle heure puis-je arriver et partir ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-7" class="hidden" aria-labelledby="accordion-flush-heading-7">
                    <div>
                        <p class="mb-2 text-white">L’arrivée se fait à partir de 16h et jusqu'à 18h et le départ jusqu'à 11H. Ceci dit, les heures d'arrivée et de départ peuvent être ajustées sur demande. Veuillez nous contacter pour organiser votre arrivée et votre départ.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-8">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                        <span class="text-lg">Comment puis-je accéder aux cabanes ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-8" class="hidden" aria-labelledby="accordion-flush-heading-8">
                    <div>
                        <p class="mb-2 text-white">Nos cabanes sont accessibles à pied, mais certaines peuvent nécessiter une courte randonnée pour y accéder. Nous vous fournirons toutes les informations nécessaires lors de votre réservation.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-9">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-9" aria-expanded="false" aria-controls="accordion-flush-body-9">
                        <span class="text-lg">Les cabanes sont-elles adaptées pour les personnes à mobilité réduite ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-9" class="hidden" aria-labelledby="accordion-flush-heading-9">
                    <div>
                        <p class="mb-2 text-white">Oui, nos cabanes sont accessibles aux personnes à mobilité réduite.</p>
                    </div>
                </div>
                <h2 id="accordion-flush-heading-10">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-white dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-10" aria-expanded="false" aria-controls="accordion-flush-body-10">
                        <span class="text-lg">Avez-vous des offres spéciales ou des forfaits disponibles ?</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-10" class="hidden" aria-labelledby="accordion-flush-heading-10">
                    <div>
                        <p class="mb-2 text-white">Nous proposons régulièrement des offres spéciales et des forfaits thématiques. Consultez notre site web ou suivez-nous sur les réseaux sociaux pour rester informé(e) des dernières offres.</p>
                    </div>
                </div>
            </div> 
         
    @endsection 
     

 




</body>
</html>