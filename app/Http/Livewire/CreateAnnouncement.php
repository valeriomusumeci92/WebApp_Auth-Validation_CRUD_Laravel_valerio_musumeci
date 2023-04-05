<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;


class CreateAnnouncement extends Component
{
    public $title;
    public $body ;
    public $price ;

    public function store (){
        Announcement::create([
            // sulla sininistra ho le chiavi che rappresentano le colonne della tablle sulla destra ho i valori che sto inserendo tramite gli input il valore che inserirò all'interno di quella colonna title conterrà cioè che è contento nella $title che richiamo nell'input tramite wire:model
            'title' => $this->title,
            'body' => $this ->body,
            'price' => $this ->price,

        ]);
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
