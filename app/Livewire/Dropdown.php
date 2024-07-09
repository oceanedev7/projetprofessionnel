<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Prestation;


class Dropdown extends Component
{

    public $categories;
    public $selectedcategorie=null;
    public $prestations; 
    public $search, $isEmpty = '';

    public function mount () {
        $this->categories=Categorie::all();
    }

    public function updatedSelectedcategorie () {
        $this->prestations=Prestation::where('categorie_id', $this->selectedcategorie)->get();
    }

    



    public function render()
    {
        dump($this->search);
        if (!is_null($this->search)) {
            $prestations = Prestation::search($this->search)
                ->take(5)
                ->get();
            $this->isEmpty = '';
        } else {
            $prestations = [];
            $this->isEmpty = __('Nothings Found.');
        }

        return view('livewire.dropdown', [
            'prestations' => $prestations,
        ]);
    }
}
