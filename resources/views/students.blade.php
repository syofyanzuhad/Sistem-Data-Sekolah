@extends('layouts.app')

@section('content')

{{-- {{dd($students)}} --}}
{{-- {{dd(session())}} --}}
   <!-- Dashboard -->
      <div class="row justify-content-center dashboard">
            <div class="col-md-11">
            @if (isset($_POST['submit']))
            
               @if ($errors->all() == true)
               {{-- {{ $errors }} --}}
                  @foreach ($errors->all() as $e)
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Failed!</strong> {{$e}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endforeach
               @else
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Success!</strong> Data has been updated !
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
            @endif
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success!</strong> Your data has been updated.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endif
   
               @foreach ($students as $item)

               <div class="card mb-4">
                  <div class="card-header ">
                        <div class="row justify-content-between">
                        <div class="col-md-3 name">
                           <b>{{$item->name}}</b> | <i>{{$item->classes->class}}</i>
                        </div>
                        <div class="col-md-3 text-right">
                           <?php
                              if ($user_id == !null) {
                           echo "" ?>                     
                              <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                    <i class="fa fa-pencil"></i></a>
                              </button>  
                              <button class="badge badge-pill badge-danger">
                                    <a href="{{route('student/delete', $item->id)}}" style="color:white"><i class="fa fa-trash"></i></a>
                              </button> 
                           <?php
                              }
                           ?>
                              <button type="button" class="badge btn-secondary" data-toggle="modal" data-target="#detailModal{{$item->id}}">
                                    <i class="fa fa-bars"></i>
                              </button>
                        </div>
                     </div>
                  </div>

                  <div class="card-body bg-dark">
                        <table class="table table-bordered table-striped table-dark">
                           <thead class="thead-dark">
                              <td> Photo </td>
                              <td> NIK </td>
                              <td> Supervisor </td>
                              <td> City </td>
                              <td> Address </td>
                           </thead>
                           <tr>
                              <td> <img src="{{$item->photo}}" alt="" style="height:20%"> </td>
                              <td> {{$item->nik}} </td>
                              <td> {{$item->teacher->teacher_name}} </td>
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
                           <h5 class="modal-title" id="exampleModalLabel"><b>{{$item->name}}</b> | <i>{{$item->classes->class}}</i></h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                           </div>
                           <div class="modal-body">

                           <table class="table table-striped">
                              <tr>
                                    <td> NIK </td>
                                    <td> {{$item->nik}} </td>
                              </tr>
                              <tr>
                                    <td> Name </td>
                                    <td> {{$item->name}} </td>
                              </tr>
                              <tr>
                                    <td> Class </td>
                                    <td> {{$item->classes->class}} </td>
                              </tr>
                              <tr>
                                    <td> Supervisor </td>
                                    <td> {{$item->teacher->teacher_name}} </td>
                              </tr>
                              <tr>
                                    <td> City </td>
                                    <td> {{$item->city->city}} </td>
                              </tr>
                              <tr>
                                    <td> Address </td>
                                    <td> {{$item->address}} </td>
                              </tr>
                           </table>
                           
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
                              <h5 class="modal-title" id="exampleModalLabel"><b>{{$item->name}}</b> | <i>{{$item->classes->class}}</i></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>

                           <div class="modal-body">
                           <form action="{{route('student/edit')}}" method="post">
                              @csrf
                              <table>
                                 <div class="form-group form-inline">
                                    <tr> 
                                       <td> <label for="name">Name </label> </td>
                                       <td> <input name="name" type="text" class="form-control" id="name" value="{{$item->name}}"> </td>
                                    </tr>
                                       <input name="id" type="hidden" value="{{$item->id}}">
                                    <tr>
                                       <td> <label for="nik">NIK </label> </td>
                                       <td> <input name="nik" type="text" class="form-control" id="nik" value="{{$item->nik}}"> </td>
                                    </tr>
                                    <tr>
                                       <td> <label for="class">Class </label> </td>
                                       <td> <select name="class" id="class" class="form-control">
                                          @foreach ($classes as $c)
                                          @if ($c->id === $item->classes->id)
                                                <?php $active = 'selected'; ?>
                                                @else 
                                                <?php $active = ''; ?>
                                          @endif
                                                <option {{$active}} value="{{$c->id}}" > {{$c->class}} </option>    
                                          @endforeach
                                       </select> </td>
                                    </tr>
                                    <tr>
                                       <td> <label for="teacher">Supervisor </label> </td>
                                       <td> <select name="teacher" id="teacher" class="form-control">
                                             @foreach ($teachers as $c)
                                             @if ($c->id === $item->teacher->id)
                                                   <?php $active = 'selected'; ?>
                                                   @else 
                                                   <?php $active = ''; ?>
                                             @endif
                                                   <option {{$active}} value="{{$c->id}}" > {{$c->teacher_name}} </option>    
                                             @endforeach
                                          </select> </td>
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
                                       <td> <input name="address" type="text" class="form-control" id="address" value="{{$item->address}}"> </td>
                                    </tr>
                                 </div> 
                                 <input name="id" type="hidden" value="{{$item->id}}">

                                 </table>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="submit" type="submit" class="btn btn-primary" > Save </button>
                                 </div>
                              </form>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <!-- Akhir Modal Edit -->


               @endforeach
               {{$students->links()}}

            </div>
      </div>
@endsection
