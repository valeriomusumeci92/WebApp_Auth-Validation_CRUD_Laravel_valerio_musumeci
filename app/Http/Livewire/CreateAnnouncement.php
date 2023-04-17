<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{

        use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcement;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category'=>'required',
        'price' => 'required|numeric',
        'images.*'=> 'image|max:1024',
        'temporary_images.*'=>'image|max:1024',

    ];

    protected $message =[
        'required' =>'il campo :attribute è richiesto',
        'min' =>'il campo :attribute è corto',
        'numeric' => 'il campo :attribut dev\'essere un numero',
        'temporary.images.required' => "L'immagine è richiesta",
        'temporary.images.*.image' => "I file devono essere immagini",
        'temporary.images.*.max' => "L'immagine deve essere massimo di 1MB",
        'images.images' => "L'immagine deve essere un immagine",
        'images.max' => "L'immagine deve essere massimo 1MB",


    ];

    public function updatedTemporaryImages(){
       
        if($this->validate([
            'temporary_images.*' =>'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }



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
            
            RemoveFaces::withChain([
                new ResizeImage($newImage->path , 400 , 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id),
            ])->dispatch($newImage->id);
          

            
        }
        
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        
    }

        Auth::user()->announcements()->save($this->announcement);
        session()->flash('message' , 'Annuncio inserito con successo, sarà pubblicato dopo la revisione');
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
        $this->images = [];
        $this->temporary_images = []; 
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }

    

}
