@extends('admin.admin_template')
@section('admin')
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/b6v1ckj5yh64nnitghxyy6hamejps60q6qtl056263rhilps/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!-- page-content -->
<div class="page-content">
    <!-- div container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <style type="text/css">
                    .bootstrap-tagsinput .tag{
                        margin-right: 2px;
                        color: #b70000;
                        font-weight: 700px;
                    } 
                </style>

                    <h4 class="card-title"> Edit Announcement </h4>  <br>  
                    <form method="POST" action="{{ route('update.announcement', $edit_announcement->id) }}" enctype="multipart/form-data">
                        @csrf                        
                        
                        <!-- announcement title -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement Title</label>
                            <div class="col-sm-10">
                                <input name="announcement_title" class="form-control" type="text" value="{{ $edit_announcement->announcement_title }}" id="short_title">
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- announcement category -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement Category</label>
                            <div class="col-sm-10">
                                <input name="announcement_category" class="form-control" type="text" value="{{ $edit_announcement->announcement_category }}">
                            
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- announcement tags -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address link</label>
                            <div class="col-sm-10">
                                <input name="address_link" class="form-control" type="text" value="{{ $edit_announcement->address_link }}">
                            
                            </div>
                        </div>
                        <!-- end row -->
                        
                          <!-- Long description -->
                          <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="announcement_description" id="elm1"> {{ $edit_announcement->announcement_description }} </textarea>                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!--Pannouncement Image Upload -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">announcement Image</label>
                            <div class="col-sm-10">
                                <input name="image_url" class="form-control" type="file" value="" id="image">
                              
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- announcement image Preview -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img id="showImage" class="w-25 rounded avatar-lg" src="{{ asset ($edit_announcement->image_url) }}" alt="image">
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <!-- submit button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update announcement">

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

    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ]
    });

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