@extends('layouts.app')

@section('title', 'Edit Table')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Create Item</h1>  
    <a href="/dashboard/table" class="btn btn-primary mb-3">Kembali</a>
</div>

<form method="post" action="/dashboard/table/{{ $table->id }}">
    @method('put')
    @csrf

    <div class="mb-3">
      <label for="no_table" class="form-label">No Table</label>

      <input type="text" class="form-control" name="no_table" id="no_table" value="{{ $table->name }}" autocomplete="off" placeholder="Masukan No Table" required>

      @error('no_table') 
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
    </div>

    <div class="mb-3">
        <label for="no_room" class="form-label">No Room</label>
  
        <input type="text" class="form-control" name="no_room" id="no_room" value="{{ $table->no_room }}" autocomplete="off" placeholder="Masukan No Room" required>
  
        @error('no_room') 
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror
      </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/dashboard/category" class="btn btn-danger" onclick="return confirm('Anda yakin untuk batal?, semua perubahan tidak akan di simpan')">Batal</a>    
</form>

@endsection
