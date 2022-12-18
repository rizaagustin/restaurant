@extends('layouts.app')

@section('title', 'CATEGORY')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">CATAGORIES</h1>  
    <a href="/dashboard/category/create" class="btn btn-primary mb-3">Create Category</a>
</div>
@if(session()->has('success'))

<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>

@endif
<div class="table-responsive col-lg-12">

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col-8">Name</th>
          <th class="col-4">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $key => $category)
        <tr>
            <td class="col-8">{{ $category->name }}</td>
            <td class="col-4">
              <a href="/dashboard/category/{{ $category->id}}/edit" type="button" class="btn btn-sm btn-success update" data-id="{{ $category->id }}">Update</a>
                <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-sm  btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">Hapus</button>
                </form>  
            </td>
          </tr>            
        @endforeach
      </tbody>
    </table>
</div>

@endsection