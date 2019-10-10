@extends('layouts.app')

@section('content')

{{-- {{dd($classes)}} --}}
    <!-- Dashboard -->
    <div class="col-md-10 col-sm-8 mt-4">
        <div class="row justify-content-center dashboard">
            <div class="col-md-6">
                @foreach ($cities as $item)
                {{-- {{dd($classes)}} --}}
                <div class="card mb-4">

                        <div class="card-header justify-content-between">
                            <div class="row">
                            <div class="col-md-8 name">
                                <b>{{$item->city}} City</b>
                            </div>
                            <div class="col-md-4 text-right">
                        <?php
                            if ($user_id == !null) {
                        echo "" ?>                     
                                <a href=""><i class="fa fa-pencil"></i></a> | 
                                <a href=""><i class="fa fa-trash"></i></a>
                        <?php
                            }
                        ?>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detailClass{{$item->id}}">
                                    <i class="fa fa-bars"></i>
                                </button>
                                
                            </div>
                            </div>
                        </div>

                    <div class="card-body bg-dark">
                        <table class="table table-bordered table-striped table-dark">
                            <tr>
                                <td> Student : </td>
                                <td> {{count($item->student)}} </td>
                            </tr>
                            <tr>
                                <td> Supervisor : </td>
                                <td> {{$item->teacher[0]->teacher_name}} </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="detailClass{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td> Student : </td>
                                    <td> {{count($item->student)}} </td>
                                </tr>
                                <tr>
                                    <td> Teacher : </td>
                                    <td> {{$item->teacher[0]->teacher_name}} </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        Student in this city :
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        @foreach ($item->student as $student)
                                            <ul>
                                                <li>
                                                    {{$student->name}}
                                                </li>    
                                            </ul>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Akhir Modal -->
                </div>

                @endforeach

                {{$cities->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
