<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;


class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'price' => 'required|numeric',
    ];

    protected $message =[
        'required' =>'il campo :attribute è richiesto',
        'min' =>'il campo :attribute è corto',
        'numeric' => 'il campo :attribut dev\'essere un numero',
    ];

    public function store (){
        Announcement::create([
            // sulla sininistra ho le chiavi che rappresentano le colonne della tablle sulla destra ho i valori che sto inserendo tramite gli input il valore che inserirò all'interno di quella colonna title conterrà cioè che è contento nella $title che richiamo nell'input tramite wire:model
            'title' => $this->title,
            'body' => $this ->body,
            'price' => $this ->price,

        ]);

        session()->flash('message' , 'Annuncio inserito con successo');
        $this->cleanForm();
    }

        public function updated ($propertyName){
            $this->validateOnly($propertyName);
        }

    public function cleanForm(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
            
    }


    public function render()
    {
        return view('livewire.create-announcement');
    }
}
