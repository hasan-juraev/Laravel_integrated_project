@extends('admin.admin_template')
@section('admin')

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                    <h4 class="card-title">Edit Education</h4>  <br>  
                    <form method="POST" action="{{ route('update.education', $edit_education->id)}}" enctype="multipart/form-data">
                        @csrf

                        <!-- Education title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Education title </label>
                            <div class="col-sm-10">
                                <input name="title" class="form-control" type="text" value="{{ $edit_education->title }}">
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Education description </label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="education_description" value="{{ $edit_education->education_description }}" > </textarea>  
                                @error('education_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror   
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- type -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Education type </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="education_type" value="{{ $edit_education->education_type }}"> 
                                @error('education_type')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>
                        
                        </div>
                        <!-- end row -->

                        <!--Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Image </label>
                            <div class="col-sm-10">
                                <input name="image_url" class="form-control" type="file" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ asset($edit_education->image_url)}}" alt="image">
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