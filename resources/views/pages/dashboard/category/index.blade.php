@extends('layouts.app')

@section('title', 'CATEGORY')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">CATAGORIES</h1>  
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create Category</a>
</div>
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
                <button type="button" class="btn btn-sm  btn-success">Update</button>
                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
            </td>
          </tr>            
        @endforeach
      </tbody>
    </table>
</div>

@endsection