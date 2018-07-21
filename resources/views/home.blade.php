@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><b>Monitor Management</b> <a href="{{url('create')}}" class="btn btn-success float-right"><b><i class="fas fa-plus"></i> Create</b></a></h5>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered table-hover table-">
                        <thead>
                          <tr class="table-active">
                            <th scope="col" class="text-center">Seq No.</th>
                            <th scope="col" class="text-center">Page Name</th>
                            <th scope="col" class="text-center">Url Iframe</th>
                            <th scope="col" class="text-center">Duration Time</th>
                            <th scope="col" class="text-center">Published</th>
                            <th scope="col" class="text-center">Create Date</th>
                            <th scope="col" class="text-center">Update Date</th>
                            <th scope="col" class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $item)
                                <tr>
                                    <th scope="row" class="text-center">{{$item->seq}}</th>
                                    <td>{{$item->name}}</td>
                                    <td class="text-center">{{$item->url}}</td>
                                    <td class="text-center">
                                        @if($item->minutes != NULL)
                                            {{$item->minutes}} minutes : {{$item->seconds}} seconds
                                        @else
                                            {{$item->seconds}} seconds
                                        @endif
                                    </td>
                                    @if($item->published == 1)
                                        <td class="text-center"><i class="far fa-eye"></i></i></td>
                                    @else
                                        <td class="text-center"><i class="far fa-eye-slash"></i></td>
                                    @endif
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{url('edit/'.$item->id)}}" class="btn btn-warning">Edit</a>&nbsp;
                                        <a href="#" class="btn btn-danger delete" data-id="{{$item->id}}" data-token="{{ csrf_token() }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach                       
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
         $('.delete').on('click', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var token = $(this).data('token');
                if(confirm('Are you sure?')){
                    $.ajax({
                            type: "DELETE",
                            url: "{{url('delete')}}/"+id,
                            data: { 
                                "id": id,
                                "_token": token,
                             },
                            async: true,
                            success: function(response){
                                if(response){
                                    location.reload();
                                }                    
                            }
                        });
                }
            }); 
</script>
@endsection
