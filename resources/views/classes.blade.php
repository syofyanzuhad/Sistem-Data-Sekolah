@extends('layouts.app')

@section('content')

{{-- {{dd($classes)}} --}}
   <!-- Dashboard -->
<div class="row justify-content-center dashboard">
   <div class="col-md-10 col-sm-8 mt-4">
            @if ($errors->all() == true)
               @foreach ($errors->all() as $e)
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Empty column!</strong> You should fill the empty class.
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
               @foreach ($classes as $item)
               {{-- {{dd($classes)}} --}}

                     <div class="card mb-4">
                        <div class="card-header justify-content-between">
                           <div class="row">
                              <div class="col-md-8 name">
                                 <b>Class {{$item->class}}</b>
                              </div>
                              <div class="col-md-4 text-right">
                           <?php
                              if ($user_id == !null) {
                           echo "" ?>                     
                              <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                 <i class="fa fa-pencil"></i></a>
                              </button>  
                              <button class="badge badge-pill badge-danger">
                                 <a href="{{route('class/delete', $item->id)}}" style="color:white"><i class="fa fa-trash"></i></a>
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
                        <div class="card-body" >
                           <table class="table table-dark table-striped" style="border-radius: 10px">
                              <tr>
                                    <td> Student : </td>
                                    <td> {{count($item->student)}} </td>
                              </tr>
                              <tr>
                                    <td> Supervisor : </td>
                                    @foreach ($item->teacher as $teacher)
                                    
                                    <td> {{$teacher->teacher_name}} </td>
                                    @endforeach
                              </tr>
                           </table>
                           
                        </div>
                     </div>

                  

                  <!-- Modal Detail -->
                  <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Class {{$item->class}} </h5>
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
                                    <td> Supervisor : </td>
                                    @foreach ($item->teacher as $teacher)
                                    
                                    <td> {{$teacher->teacher_name}} </td>
                                    @endforeach
                              </tr>
                           </table>
                           <table>
                              <tr>
                                    <td>
                                       Member Of Class :
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
                  <!-- Akhir Modal Detail -->

                  <!-- Modal Edit -->
                  <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Class {{$item->class}}</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>
                           <div class="modal-body">
                           <form action="{{route('class/edit')}}" method="post">
                                    @csrf
                                    
                                    <div class="form-group">
                                       <label for="class">Class Name</label>
                                       <input name="class" type="text" class="form-control" id="class" placeholder="name of class">
                                    </div>
                              <input name="id" type="hidden" value="{{$item->id}}">

                           <table class="table table-bordered table-striped">
                              <tr>
                                    <td> Student : </td>
                                    <td> {{count($item->student)}} </td>
                              </tr>
                              <tr>
                                    <td> Supervisor : </td>
                                    @foreach ($item->teacher as $teacher)
                                    
                                    <td> {{$teacher->teacher_name}} </td>
                                    @endforeach
                              </tr>
                           </table>
                           <table>
                              <tr>
                                    <td>
                                       Member Of Class :
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
                           <input type="submit" class="btn btn-primary" value="Save">
                        </form>
                           </div>
                        </div>
                        </div>
                  </div>

                  <!-- Akhir Modal Edit -->

               @endforeach

               {{$classes->links()}}
            </div>
      </div>
@endsection
