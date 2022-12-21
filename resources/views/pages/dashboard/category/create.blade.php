@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Create Item</h1>  
    <a href="/dashboard/category" class="btn btn-primary mb-3">Kembali</a>
</div>

<form method="post" action="/dashboard/category" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label">Name</label>

      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autocomplete="off" placeholder="Masukan Nama Category" required>

      @error('name') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/dashboard/category" class="btn btn-danger" onclick="return confirm('Anda yakin untuk batal?, semua perubahan tidak akan di simpan')">Batal</a>    
</form>

@endsection
