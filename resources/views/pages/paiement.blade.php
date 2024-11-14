<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paiement sécurisé </title>
</head>
<body>


    <div class="bg-custom-beige w-full md:h-screen">

   
        <div class="fixed z-10 w-full"> 
            <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-white bg-opacity-65 text-custom-marron py-3 px-3 border-none rounded-md w-12 text-base inline-block text-center">
                <i class="fa-solid fa-bars"></i>
            </a>    
            <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
                class="absolute top-8 right-8 bg-white bg-opacity-65 text-custom-marron py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
                 {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
             </a>   
        </div>
    
        <div class="md:p-32 p-12 flex justify-center items-center h-full">
            <div class="bg-white mt-16 md:mt-0 p-12 rounded-lg shadow-lg w-full md:max-w-4xl md:grid md:grid-cols-2 ">
    
               
                <div>
                    <div class="uppercase text-custom-marron text-lg font-bold mb-4">{{ __('content.paiement') }} :</div>
    
                    <div class="mb-2">
                        <strong>{{ __('content.cabane-n') }}  :</strong> {{ __('content.nom_cabane_' . lcfirst(str_replace(' ', '', session('nomCabane')))) }} - {{ session('capacite') }} {{ __('content.pax') }}
                    </div>
    
                    <div class="mb-2">
                        <strong>{{ __('content.n-adulte') }} :</strong> {{ session('nombreAdultes') }} {{ __('content.adultes') }}
                    </div>
    
                    @if(session('nombreEnfants') > 0)
                        <div class="mb-2">
                            <strong>{{ __('content.n-enfant') }} :</strong> {{ session('nombreEnfants') }} {!! nl2br(__('content.enfants')) !!}
                        </div>
                    @endif
    
                    <div class="mb-2">
                        <strong>{{ __('content.arrivee') }} :</strong> 
                        @if ( App::getLocale() === 'en')
                        {{ \Carbon\Carbon::parse(session('dateDepart'))->format('m/d/Y') }}
                    @else
                        {{ \Carbon\Carbon::parse(session('dateDepart'))->format('d/m/Y') }}
                    @endif
                    </div>
    
                    <div class="mb-2">
                        <strong>{{ __('content.depart') }}:</strong> 
                        @if ( App::getLocale() === 'en')
                        {{ \Carbon\Carbon::parse(session('dateDepart'))->format('m/d/Y') }}
                    @else
                        {{ \Carbon\Carbon::parse(session('dateDepart'))->format('d/m/Y') }}
                    @endif
                    </div>
    
                    <div class="mb-2">
                        <strong>{{ __('content.nuitee') }} :</strong> {{ session('nombreNuitees') }} {{ __('content.nuit') }}
                    </div>
    
                    <div class="mb-4">
                        <label for="amount" class="block text-gray-700 font-semibold">{{ __('content.total') }} :</label>
                        <div class="font-bold text-xl text-custom-marron mt-0.5">
                            {{ session('prixFinal') }} €
                        </div>
                        <input type="hidden" name="amount" id="amount" value="{{ session('prixFinal') * 100 }}">
                    </div>
                </div>
    
             
                <div class="flex flex-col justify-center">
                    <form action="{{route ('payment.process')}}" method="POST" id="payment-form">
                        @csrf
    
                        <div class="mb-4">
                           
                            <div class="flex justify-between items-center mb-1">
                                <label for="card-element" class="text-gray-700"> {{ __('content.carte') }}</label>
                                
                                <div class="relative group inline-block cursor-pointer">
                                    <i class="fa-solid fa-circle-info text-gray-500"></i>
                                    <span class="absolute bottom-full right-0 transform translate-x-1/2 mb-2 w-48 bg-gray-800 text-white text-center text-sm rounded-md py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        {{ __('content.cvc') }}
                                    </span>
                                </div>
                            </div>
                    
                            <div id="card-element" 
                                 class="border border-gray-300 rounded focus:border-custom-vert focus:ring-custom-vert p-3 w-full"
                                 autocomplete="off" 
                                 autocorrect="off"></div>
                        
                            <div id="card-errors" role="alert" class="text-red-500 mt-2 text-center"></div>
                        </div>
    
                        <button type="submit" class=" space-x-2 bg-custom-marron text-white font-bold rounded py-2 px-4 w-full">
                            <span>  <i class="fa-solid fa-lock"></i> </span>
                           <span> {{ __('content.confirmer') }} </span>
                        </button>
                    </form>
    
                    @if(session('error'))
                    <p class="text-red-600 font-bold text-center">{{ session('error') }}</p>
                @endif
    
                    <img class="w-full" src="{{ Storage::url('images/cblogo.png') }}" alt="Logos des services de paiement ">
    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>





<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_51QCOnYC04zdWVjVGimUQlKBkErpT0ului28Q7pRcm8HkipLg5rbiWag7NVWn61KXFW5UookZ3OZNMUKb93s7FOkG00p8bC31zV'); 
    const elements = stripe.elements();
    
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    cardElement.on('change', function(event) {
        const displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
               
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                
                const tokenInput = document.createElement('input');
                tokenInput.setAttribute('type', 'hidden');
                tokenInput.setAttribute('name', 'stripeToken');
                tokenInput.setAttribute('value', result.token.id);
                form.appendChild(tokenInput);

                form.submit();
            }
        });
    });
</script>