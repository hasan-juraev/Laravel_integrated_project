@extends('admin.admin_template')
@section('admin')

<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Cargo </h4><br>                        

                        <table table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th> Sl </th>
                                <th> Title </th>
                                <th> Category </th>                                
                                <th> Image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($all_entertainment as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <!-- relationship is made on this value -->
                                <td> {{ $item->entertainment_title }} </td>
                                <td> {{ $item->entertainment_category }} </td>
                            
                                
                                                                
                                <td> <center><img src="{{ asset($item->image_url) }}" alt="image" style="width:50px; height:50px"> </center></td>
                                <!-- action -->
                                <td>
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <a class="btn btn-info" href="{{ route('edit.entertainment', $item->id) }}" title="edit"> <i class="fa fa-edit"></i> </a>
                                        </div>

                                        <div class="col-xs-6">
                                            <a class="btn btn-danger" href="{{ route('delete.entertainment', $item->id) }}" title="delete" id="delete"> <i class="fa fa-trash-o"> </i> </a>
                                        </div>
                                    </div>
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