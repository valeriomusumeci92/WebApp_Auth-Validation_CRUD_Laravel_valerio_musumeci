
    
<div>
    <h1>Crea il tuo annuncio!</h1>
    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo annuncio</label>
          <input wire:model="title" type="text" class="form-control">
        
        </div>
        
        <div class="mb-3">
          <label for="body" class="form-label">Descrizione</label>
          <textarea wire:model="body" type="text" class="form-control"> </textarea>
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input wire:model="price" type="number" class="form-control">
            
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

