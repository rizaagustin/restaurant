@extends('layouts.app')

@section('title', 'CATEGORY')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">Tables</h1>  
    <a href="/dashboard/table/create" class="btn btn-primary mb-3">Create Table</a>
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
          <th class="col-4">No Table</th>
          <th class="col-4">No Room</th>
          <th class="col-4">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tables as $key => $table)
        <tr>
            <td class="col-8">{{ $table->no_table }}</td>
            <td class="col-4">{{ $table->no_room }}</td>
            <td class="col-4">
              <a href="/dashboard/table/{{ $table->id}}/edit" type="button" class="btn btn-sm btn-success update" data-id="{{ $table->id }}">Update</a>
                <form action="/dashboard/table/{{ $table->id }}" method="post" class="d-inline">
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