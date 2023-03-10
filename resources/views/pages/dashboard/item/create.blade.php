@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Update Item</h1>  
    <a href="/dashboard/item" class="btn btn-primary mb-3">Kembali</a>
</div>

<form method="post" action="/dashboard/item" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>

      <img class="img-preview card-image border-dark mb-3 d-block" style="width: 7rem;" id="image-preview">
      <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}" autocomplete="off" placeholder="Masukan Foto Menu" onchange="previewImage()" required>

      @error('image') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>

      <select class="form-select" name="category_id" aria-label="Default select example" required>
        <option selected value="">Category</option>
          @foreach($categories as $key => $category)
            @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                                
            @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>                                
            @endif
          @endforeach
      </select>

      @error('category_id') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror

    </div>
    
    <div class="mb-3">
      <label for="name" class="form-label">Menu</label>
      <input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}" autocomplete="off" placeholder="Masukan Nama Menu" required>

      @error('name') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror

    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Masukan Harga" autocomplete="off">

        @error('price') 
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror
     
    </div>
    <a href="/dashboard/item" class="btn btn-danger" onclick="return confirm('Anda yakin untuk batal?, semua perubahan tidak akan di simpan')">Batal</a>    
    <button type="submit" class="btn btn-primary">Save</button>
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