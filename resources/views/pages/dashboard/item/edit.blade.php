@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Create Item</h1>  
    <a href="/dashboard/item" class="btn btn-primary mb-3">Kembali</a>
</div>

<form method="post" action="/dashboard/item/{{ $item->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>

      @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" id="image-preview" class="img-preview card-image border-dark mb-3 d-block" style="width: 7rem;">                
      @else
            <img class="img-preview img-fluid img-fluid mb-3 col-sm-3" id="image-preview">                
      @endif

      <input type="file" class="form-control" name="image" id="image" value="{{ $item->image }}" autocomplete="off" placeholder="Masukan Foto Menu" onchange="previewImage();">
      <input type="hidden" name="oldImage" value="{{ $item->image }}">

      @error('image') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
    
    </div>
    
    <div class="mb-3">
    <select class="form-select" name="category_id" aria-label="Default select example" required>
        <option selected value="">Category</option>
          @foreach($categories as $key => $category)

          @if ($item->category_id == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                                
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>                                
            
        @endif
            
        @endforeach
      </select>
      </div>
    
    <div class="mb-3">
      <label for="name" class="form-label">Menu</label>
      <input type="name" class="form-control" name="name" id="name" value="{{ $item->name }}" autocomplete="off" placeholder="Masukan Nama Menu" required>
      @error('name') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ $item->price }}" placeholder="Masukan Harga" autocomplete="off">
        @error('price') 
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/dashboard/item" class="btn btn-danger" onclick="return confirm('Anda yakin untuk batal?, semua perubahan tidak akan di simpan')">Kembali</a>    
</form>

@endsection

@push('after-script')
<script>
    function previewImage(){
        // alert('ok')
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endpush