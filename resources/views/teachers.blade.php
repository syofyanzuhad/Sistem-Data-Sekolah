@extends('layouts.app')

@section('content')

{{-- {{dd($students)}} --}}
    <!-- Dashboard -->
    <div class="col-md-12 col-sm-8 mt-4">
        <div class="row justify-content-center dashboard">
            <div class="col-md-12">

                @if ($errors->all() == !null)
                    @foreach ($errors->all() as $e)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Empty column!</strong> {{$e}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endforeach
                @endif
                @if ($errors->all())
                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your data has been updated.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
  

                @foreach ($teachers as $item)
                    
                <div class="card mb-4">

                        <div class="card-header justify-content-between">
                            <div class="row">
                            <div class="col-md-8 name">
                                <b>{{$item->teacher_name}}</b> | <em>{{$item->job}}</em>
                            </div>
                            <div class="col-md-4 text-right">
                            <?php
                                if ($user_id == !null) {
                                echo "" 
                            ?>                     
                                <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                    <i class="fa fa-pencil"></i></a>
                                </button> 
                                <button class="badge badge-pill badge-danger">
                                <a href="{{route('teacher/delete', $item->id)}}" style="color:white"><i class="fa fa-trash"></i></a>
                                </button> 
                            <?php
                                }
                            ?>
                                <button type="button" class="badge btn-secondary bg-none" data-toggle="modal" data-target="#detailModal{{$item->id}}">
                                    <i class="fa fa-bars"></i>
                                </button>
                                    </div>
                            </div>
                        </div>

                    <div class="card-body bg-dark">
                        <table class="table table-bordered table-striped table-dark">
                            <thead class="thead-dark">
                                <td> Photo </td>
                                <td> Supervisor of </td>
                                <td> City </td>
                                <td> Address </td>
                            </thead>
                            {{-- {{dd($item)}} --}}
                            <tr>
                                <td> <img src="{{$item->photo}}" alt="" style="height:20%"> </td>
                                <td> 
                                    @if (empty($item->classes['class']))
                                        {{$item->classes['class']}}
                                    @endif
                                        You're not Supervisor
                                </td>
                                <td> {{$item->city->city}} </td>
                                <td> {{$item->address}} </td>

                            </tr>
                        </table>
                    </div>
                </div>
                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Teacher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                            <td> Name </td>
                                            <td>: {{$item->teacher_name}} </td>
                                    </tr>
                                    <tr>
                                            <td> Job </td>
                                            <td>: {{$item->job}} </td>
                                    </tr>
                                    <tr>
                                            <td> Supervisor of </td>
                                            <td>:
                                                @if (empty($item->classes->class))
                                                    {{($item->classes['class'])}}
                                                @endif
                                                    You're not Supervisor
                                            </td>
                                    </tr>
                                    <tr>
                                            <td> City </td>
                                            <td>: {{$item->city->city}} </td>
                                    </tr>
                                    <tr>
                                            <td> Address </td>
                                            <td>: {{$item->address}} </td>
                                    </tr>
                                </table>
                                {{-- {{dd($item->classes['class'])}} --}}
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                            </div>
                    </div>
                    <!-- Akhir Modal Detail -->

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            <form action="{{route('teacher/edit')}}" method="post">
                                @csrf
                                <table >
                                <div class="form-group form-inline ">
                                    <tr >
                                        <td > <label for="name" >Name </label> </td>
                                        <td> <input name="name" type="text" class="form-control" id="name" value=" {{$item->teacher_name}} "> </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="job">Job</label> </td>
                                        <td> <input name="job" type="text" class="form-control" id="job" value=" {{$item->job}} "> </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="city">City</label> </td>
                                        <td> <select name="city" id="city" class="form-control">
                                            @foreach ($cities as $c)
                                            @if ($c->id === $item->city->id)
                                                <?php $active = 'selected'; ?>
                                                @else 
                                                <?php $active = ''; ?>
                                            @endif
                                                <option {{$active}} value="{{$c->id}}" > {{$c->city}} </option>    
                                            @endforeach
                                        </select> </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="address">Address </label> </td>
                                        <td> <input name="address" type="text" class="form-control" id="address" value=" {{$item->address}} "> </td>
                                    </tr>
                                </div>
                                </table>
                            
                                <input name="id" type="hidden" value="{{$item->id}}">
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Akhir Modal Edit -->
                @endforeach
                {{$teachers->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
