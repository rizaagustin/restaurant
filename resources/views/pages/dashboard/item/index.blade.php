@extends('layouts.app')

@section('title', 'MAKANAN')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h4">ITEMS</h1>  
    <a href="/dashboard/item/create" class="btn btn-primary mb-3">Create Item</a>
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
          <th scope="col">Photo</th>  
          <th scope="col">Menu</th>
          <th scope="col">Category</th>
          <th scope="col">Harga (Rp)</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      @foreach($items as $key => $item)
      <tr>
          <td class="col">  
            <img class="card-img border border-dark" src="{{ asset('storage/' . $item->image) }}"  style="width: 7rem;" alt="Card image">
            {{-- <img class="card-img" src="{{ url(Storage::url($item->image)) }}" alt="Card image"> --}}
          </td>
          
          <td class="col-6">{{ $item->name }}</td>
          <td class="col">{{ $item->category->name }}</td>
          <td class="col">{{number_format($item->price)}}</td>  
          <td class="col">
              <a href="/dashboard/item/{{ $item->id}}/edit" type="button" class="btn btn-sm btn-success update" data-id="{{ $item->id }}">Update</a>
              <form action="/dashboard/item/{{ $item->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm  btn-danger" onclick="return confirm('Are you sure delete data?')">Hapus</button>
              </form>
          </td>
        </tr>            
      @endforeach

    </table>
</div>
@endsection
@include('pages.dashboard.item.modal-create')
@include('pages.dashboard.item.modal-edit')
{{-- @include('pages.modal-edit') --}}

{{-- @push('after-script')
<script>
  $('.update').click(function(e) {

    let id = $(this).data('id');
      $.ajax({
      url: `dashboard/item/${id}`,
      type: "GET",
      cache: false,
      success: function(response) {
        
          $("#image-edit").val(response.data.image);
          $("#name-edit").val(response.data.name);
          
          $("#price-edit").val(response.data.price);
          $('#exampleModal2').modal('show');
        
        }
      });
    // alert(id);
 
  });
  </script>  
@endpush --}}
