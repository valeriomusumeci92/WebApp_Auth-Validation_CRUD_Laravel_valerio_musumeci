
    
<div>
    <h1>Crea il tuo annuncio!</h1>

    @if(session()->has('message'))
    <div class="d-flex justify-content-center my-2 alert alert-success">
      {{ session('message') }}
    </div>
    @endif

    @if(session()->has('message.revisor'))
    <div class="d-flex justify-content-center my-2 alert alert-success">
      {{ session('message.revisor') }}
    </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo annuncio</label>
          <input wire:model="title" type="text" class="form-control" @error('title') is-invalid @enderror">
        @error('title')
        {{ $message }}
        @enderror
        </div>
        
        <div class="mb-3">
          <label for="body" class="form-label">Descrizione</label>
          <textarea wire:model="body" type="text" class="form-control" @error('body') is-invalid @enderror"> </textarea>
        </div>
        @error('body')
        {{ $message }}
        @enderror
        
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input wire:model="price" type="number" class="form-control" @error('price') is-invalid @enderror">
            @error('price')
             {{ $message }}
             @enderror

             <div class="mb-3">
              <label for="category">Categoria</label>
              <select wire:model.defer="category" id="category" class="form-control">
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
             </div>
            
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

