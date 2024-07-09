<div>
    <h1>Menu Déroulant dynamique</h1>
   
    <div>
        <h1>Hello World!</h1>
    </div>

      <select wire:model.live="selectedcategorie" name="categorie" required>
        <option value="">Sélectionner une catégorie</option>
        @foreach ($categories as $categorie)
            <option value="{{$categorie->id}}">{{$categorie->type}}</option>
        @endforeach
      </select>

       @if(!is_null($selectedcategorie))
       <input type="text"
       placeholder="{{__('Search ...')}}"
       x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
       autocomplete="off"
       wire:model.debounce.500ms="search"
       aria-label="Search input" /> 
       {{-- @dump($prestations) --}}

       {{-- search box --}}
       <div x-show="isTyped" x-cloak>
        <div>
            @dump($search)
            <div>
                    @forelse($prestations as $prestation)
                        <div>
                            <ul>
                                <li>
                                    {{ $prestation->type}}    
                                </li>
                            </ul>
                        </div>
                    @empty
                        <div x-cloak>
                            {{$isEmpty}}
                        </div>
                    @endforelse
            </div>
        </div>
     
      @endif 



 {{--  <select wire:model="selectedprestation" name="type">
            <option value="">Sélectionner un type</option>
            @foreach ($prestations as $prestation)
            <option value="{{$prestation->id}}">{{$prestation->type}}</option>
             @endforeach
        </select>--}}



</div>
