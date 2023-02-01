@extends('admin.admin_template')
@section('admin')

@php
    use Illuminate\Support\Carbon;
@endphp
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
                                <th> cargo sender </th>
                                <th> cargo type </th>                               
                                <th> cargo date </th>                                
                                <th> cargo from </th>
                                <th> cargo to </th>
                                <th> cargo posted date</th>
                                <th> cargo image </th>
                                <th> Action </th>                                
                            </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($all_cargo as $item)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <!-- relationship is made on this value -->
                                <td> {{ $item->post_user_id }} </td>
                                <td> {{ $item->cargo_type }} </td>
                                <td> {{ $item->date_to_be_send }} </td>
                                <td> {{ $item->from_location }} </td>
                                <td> {{ $item->to_location }} </td>
                                <td> {{ $item->created_at-> diffForHumans() }} </td>                                
                                <td> <center><img src="{{ asset($item->image_url) }}" alt="image" style="width:50px; height:50px"> </center></td>
                                <!-- action -->
                                <td>
                                    <div class="row">

                                        <div class="col-xs-6">
                                            <a class="btn btn-info" href="{{ route('edit.cargo', $item->id) }}" title="edit"> <i class="fa fa-edit"></i> </a>
                                        </div>

                                        <div class="col-xs-6">
                                            <a class="btn btn-danger" href="{{ route('delete.cargo', $item->id) }}" title="delete" id="delete"> <i class="fa fa-trash-o"> </i> </a>
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