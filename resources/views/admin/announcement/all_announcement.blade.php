@extends('admin.admin_template')
@section('admin')

<div class="container-fluid">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Announcement</h4><br>                        

                        <table table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th> Sl </th>
                            
                                <th> Announcement Title </th>                               
                                <th> Announcement Category </th>                                
                                <th> Announcement Image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($announcements as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <!-- relationship is made on this value -->
                               
                                <td> {{ $item->announcement_title }} </td>
                                <td> {{ $item->announcement_category }} </td>
                                <td> <center><img src="{{ asset($item->image_url) }}" alt="image" style="width:50px; height:50px"> </center></td>
                                <!-- action -->
                                <td>
                                    <a class="btn btn-info sm" href="{{ route('edit.announcement', $item->id) }}" title="edit"> <i class="fa fa-edit"></i> </a>
                                    <a class="btn btn-danger sm" href="{{ route('delete.announcement', $item->id) }}" title="delete" id="delete"> <i class="fa fa-trash-o"> </i> </a>
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
