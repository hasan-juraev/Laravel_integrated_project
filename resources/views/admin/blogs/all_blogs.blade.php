@extends('admin.admin_template')
@section('admin')

<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Blogs Data</h4><br>                        

                        <table table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th> Sl </th>
                                <th> Blog Category </th>
                                <th> Blog Title </th>                               
                                <th> Blog Tags </th>                                
                                <th> Blog Image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($all_blogs as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <!-- relationship is made on this value -->
                                <td> {{ $item->blog_category_id }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->blog_tags }} </td>
                                <td> <center><img src="{{ asset($item->image) }}" alt="image" style="width:50px; height:50px"> </center></td>
                                <!-- action -->
                                <td>
                                    <a class="btn btn-info sm" href="{{ route('edit.blog', $item->id) }}" title="edit"> <i class="fa fa-edit"></i> </a>
                                    <a class="btn btn-danger sm" href="{{ route('delete.blog', $item->id) }}" title="delete" id="delete"> <i class="fa fa-trash-o"> </i> </a>
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
@endsection
