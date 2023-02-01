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

                    <h4 class="card-title">Add Cargo</h4>  <br>  
                    <form method="POST" action="{{ route('update.cargo', $edit_cargo->id) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Cargo type -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Cargo type</label>
                            <div class="col-sm-10">
                                <input name="cargo_type" class="form-control" type="text" value="{{ $edit_cargo->cargo_type }}">
                                @error('cargo_type')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Date to be send -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Sending date </label>
                            <div class="col-sm-10">
                                <input name="date_to_be_send" class="form-control" value="{{ $edit_cargo->date_to_be_send }}" type="date">
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Location from -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Location from </label>
                            <div class="col-sm-10">
                                <input name="from_location" class="form-control" value="{{ $edit_cargo->from_location }}" type="text">                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Location to -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Location to </label>
                            <div class="col-sm-10">
                                <input name="to_location" class="form-control" value="{{ $edit_cargo->to_location }}" type="text">                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                        <!-- Cargo description -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Cargo description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="cargo_description" id="elm1"> {{ $edit_cargo->cargo_description }}</textarea>  
                                @error('cargo_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>                        
                        </div>
                        <!-- end row -->

                            <!-- Cargo fee -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Cargo fee</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $edit_cargo->delivery_fee }}" name="delivery_fee"> 
                                @error('delivery_fee')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror                              
                            </div>
                        
                        </div>
                        <!-- end row -->

                        <!--Cargo Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Cargo Image</label>
                            <div class="col-sm-10">
                                <input name="image_url" class="form-control" type="file" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ asset($edit_cargo->image_url) }}" alt="image"> 
                                @error('image_url')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                            </div>

                        
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">

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