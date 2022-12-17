{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> --}}
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button> --}}

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/dashboard/item" enctype="multipart/form-data">
            @csrf          
            <div class="mb-3">
              <label for="image" class="col-form-label">Image:</label>
              <input type="text" name="image" class="form-control" id="image-edit" required>
            </div>
  
            <div class="mb-3">
              <label for="name" class="col-form-label">Menu:</label>
              <input type="text" name="name" class="form-control" id="name-edit" required>
            </div>
  
            <select class="form-select" name="category_id" id="category-edit" aria-label="Default select example" required>
              <option selected value="">Category</option>
                @foreach($categories as $key => $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>              
                @endforeach
  
            </select>
  
            <div class="mb-3">
              <label for="price"  class="col-form-label">Price:</label>
              <input type="number" name="price" class="form-control" id="price-edit" required>
            </div>
  
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>

