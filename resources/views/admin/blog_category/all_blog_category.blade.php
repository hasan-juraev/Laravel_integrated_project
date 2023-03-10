@extends('admin.admin_template')
@section('admin')
<div class="page-content">
<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Blog Category </h4><br><br>
                       

                        <table  table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Blog Category Name</th>
                                    <th>Action</th>                                
                                </tr>
                            </thead>

                            <tbody>
                               
                                @foreach($blog_category as $key => $item)
                                <tr>
                                    <td> {{ $key+1 }}</td>
                                    <td> {{ $item->blog_category }} </td>
                                    <td>
                                        <a class="btn btn-info sm" href="{{ route('edit.blog.category', $item->id) }}" title="edit"> <i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-danger sm" href="{{ route('delete.blog.category', $item->id) }}" title="delete" id="delete"> <i class="fa fa-trash-o"> </i> </a>
                                    </td>
                                
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
</div>
</div>


</script>

@endsection