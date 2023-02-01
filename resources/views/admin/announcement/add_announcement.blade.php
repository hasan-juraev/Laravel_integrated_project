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

                    <h4 class="card-title">Add Announcement</h4>  <br>  
                    <form method="POST" action="{{ route('store.announcement') }}" enctype="multipart/form-data">
                        @csrf                      

                        <!-- announcement title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement Title</label>
                            <div class="col-sm-10">
                                <input name="announcement_title" class="form-control" type="text" value="" id="short_title">
                                @error('announcement_title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- announcement category -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement category</label>
                            <div class="col-sm-10">
                                <input name="announcement_category" class="form-control" type="text" value="" >
                                @error('announcement_category')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- announcement tags -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address link </label>
                            <div class="col-sm-10">
                                <input name="address_link" class="form-control" type="text">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- announcement description -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="announcement_description" id="elm1"> </textarea>  
                                @error('announcement_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>

                      
                        </div>
                        <!-- end row -->

                        <!--Pportfolio Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement Image</label>
                            <div class="col-sm-10">
                                <input name="image" class="form-control" type="file" value="" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Portfolio image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ url('upload/no-image.jpg') }}" alt="image">
                                @error('image')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                            </div>

                        
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add announcement">

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