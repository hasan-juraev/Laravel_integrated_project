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

                    <h4 class="card-title">Add Entertainment </h4>  <br>  
                    <form method="POST" action="{{ route('store.entertainment')}}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Title </label>
                            <div class="col-sm-10">
                                <input name="entertainment_title" class="form-control" type="text">
                                @error('entertainment_title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Entertainment description </label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="entertainment_description" > </textarea>  
                                @error('entertainment_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror   
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Category -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Entertainment category </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="entertainment_category"> 
                                @error('entertainment_category')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>
                        
                        </div>
                        <!-- end row -->
                       
                        <!-- Address link -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Address link </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address_link"> 
                                @error('address_link')
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
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ url('upload/no-image.jpg') }}" alt="image">
                                @error('image_url')
                                <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>

                        
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info rounded waves-effect waves-light" value="Add">

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