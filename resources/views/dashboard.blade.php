@extends('layouts.app')

@section('content')
<head>
      
  

</head>

<div class="container w-75">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Products</a>
        </li>
      </ul>


      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


            <div class="container mt-3">
                <div class="text text-secondary text-center text-uppercase">Categories</div>
                <div class="container mt-3 mb-3 d-flex justify-content-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#AddCategory"><i class="fa fa-plus"></i> Add Category</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->title }}</td>
                        </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
            </div>


        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


            <div class="container mt-3">
                <div class="text text-secondary text-center text-uppercase">Products</div>
                <div class="container mt-3 mb-3 d-flex justify-content-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#AddProduct"><i class="fa fa-plus"></i> Add Product</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Title</th>
                            <th>Product Description</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ $product->images->first()->path }}" alt="product_image" class="img-fluid"></td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->date }}</td>
                            <td>{{ $product->categories->title }}</td>
                            <td><button data-id="{{ $product->id }}" data-toggle="modal" data-target="#confirmDeleteProduct" class="btn btn-danger btnDelete"><i class="fa fa-trash"></i> Delete product</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
      </div>
    
</div>

    {{--  Add Category Modal--}}
    <form action="{{ route('addCategory') }}" method="POST">
        @csrf
    <div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <label for="title">Category Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- End Add Category Modal --}}



    {{--  Add Product Modal--}}
    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <label for="category">Category</label>
                <select name="category_id" class="form-control mb-3 @error('category_id') is-invalid @enderror" id="category">
                  <option value=""selected disabled>Choose a Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="title">Product Title</label>
                <input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" name="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control mb-3 @error('description') is-invalid @enderror"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- <div class="img">
                  <label for="image">Images</label>
                  <input type="file" name="product_image" id="image" class="form-control w-50 mb-3">
                </div> --}}
                <div id="inputFormRow">
                  <div class="input-group mt-3 ">
                    <input type="file" name="product_image[]" id="image" class="form-control m-input">
                    @error('product_image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                      <div class="input-group-append">
                          <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                      </div>
                  </div>
                </div>

                <div id="newRow"></div>
                <button id="addRow" type="button" class="btn btn-info mt-3">Add Image</button>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        {{-- End Add Category Modal --}}

        {{-- Delete Confirmation --}}
        <div class="modal fade" id="confirmDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteProductTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h5 class="modal-title text-white  text-uppercase" id="confirmDeleteProductTitle">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body bg-danger">
                <div class="text-white text-center">Are you sure you want to delete this product ?</div>
              </div>
              <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-warning deleteProduct">Delete</a>
              </div>
            </div>
          </div>
        </div>
        {{-- End Delete Confirmation --}}

<script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
</script>
  {{-- Deleting using Modal  --}}
<script>
   $(document).on("click", ".btnDelete",  function(){
           var id = $(this).data('id');
           var link = $('.deleteProduct');
           console.log(id);
            $.ajax({
            method:"GET",
            success:function (result){
              link.attr('href' , '/delete-product/'+id) ;
              }
            })
          })
</script>

<script type="text/javascript">
  // add row
  $("#addRow").click(function () {
      var html = '';
      html += '<div id="inputFormRow">';
      html += '<div class="input-group mt-3">';
      html += '<input type="file" name="product_image[]" id="image" class="form-control m-input">';
      html += '<div class="input-group-append">';
      html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
      html += '</div>';
      html += '</div>';

      $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRow', function () {
      $(this).closest('#inputFormRow').remove();
  });
</script>
@endsection
