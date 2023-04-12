<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CreateAnnouncement extends Component
{

        use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcement;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category'=>'required',
        'price' => 'required|numeric',

    ];

    protected $message =[
        'required' =>'il campo :attribute è richiesto',
        'min' =>'il campo :attribute è corto',
        'numeric' => 'il campo :attribut dev\'essere un numero',
    ];

    public function store (){

        // $category = Category::find($this->category);

        // $announcement = $category->announcements()->create([
        //     'title' => $this->title,
        //     'body' => $this ->body,
        //     'price' => $this ->price,
        // ]);

        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
         if(count($this->images)) {
        foreach ($this->images as $image) {

            $newFileName = "announcements/{$this->announcement->id}";
            $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName , 'public')]);

            dispatch(new ResizeImage($newImage->path , 400 , 300));
        }

        File::deleteDirectory(storage_path('/app/livewire-tmp'));
    }

        Auth::user()->announcements()->save($announcement);

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
        $this->category = '';
            
    }


    public function render()
    {
        return view('livewire.create-announcement');
    }

    

}
