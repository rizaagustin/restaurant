@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Create Item</h1>  
    <a href="/" class="btn btn-primary mb-3">Create Item</a>
</div>

<form method="post" action="/item/posts" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
        @error('title') 
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>

@endsection