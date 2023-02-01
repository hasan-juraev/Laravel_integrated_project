@extends('admin.admin_template')
@section('admin')

<!-- page-content -->
<div class="page-content">

    <style type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        } 
    </style>
    <!-- div container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit</h4>  <br>  
                    <form method="POST" action="{{ route('update.housing', $edit_housing->id)}}" enctype="multipart/form-data">
                        @csrf

                        <!-- Type -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Type </label>
                            <div class="col-sm-10">
                                <input name="house_type" class="form-control" type="text" value="{{ $edit_housing->house_type}}">
                                @error('house_type')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                     
                        <!-- Type -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Title </label>
                            <div class="col-sm-10">
                                <input name="title" class="form-control" type="text" value="{{ $edit_housing->house_type}}">
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" >{{ $edit_housing->description}} </textarea>  
                                @error('description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror   
                            
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Options </label>
                            <div class="col-sm-10">
                                <input name="house_options" class="form-control" type="text"value="{{ $edit_housing->house_options}}" data-role="tagsinput">
                                @error('house_options')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror   
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Price -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="rent_price" value="{{ $edit_housing->rent_price}}"> 
                                @error('rent_price')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>
                        
                        </div>
                        <!-- end row -->
                       
                        <!-- Location -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Location </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="location" value="{{ $edit_housing->location}}">
                                @error('location')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>
                        
                        </div>
                        <!-- end row -->
                        
                        <!--Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Image </label>
                            <div class="col-sm-10">
                                <input name="image_url" class="form-control" type="file" id="image" required>
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ asset($edit_housing->image_url) }}" alt="image">
                                @error('image_url')
                                <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                        
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info rounded waves-effect waves-light" value="Update">

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
        </div>

    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                
                $('#showImage').attr('src', e.target.result);
                
            }
            reader.readAsDataURL(e.target.files['0']);
            
        });

    });

</script>


@endsection