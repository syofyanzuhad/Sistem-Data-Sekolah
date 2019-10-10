@extends('layouts/app')

@section('content')
{{-- {{dd($classes)}} --}}
<div class="col-md-12 col-sm-8 mt-4">
   <div class="row justify-content-center dashboard">
      <div class="col-md-8">
         
            @if ($errors->all() == !null)
               @foreach ($errors->all() as $e)
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Empty column!</strong> {{$e}}.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
               </button>
               </div>
               @endforeach
            @endif
            
         <div class="card border-secondary mb-3" >

            <div class="card-header bg-transparent border-secondary text-center">
               <h5 class="card-title">Insert data of Student</h5>
            </div>
            <div class="card-body text-secondary ">
                  
                  <form action="{{route('student/insert')}}" method="post">
                     @csrf
                     <table>
                        <div class="form-group form-inline">
                           <tr> 
                              <td> <label for="name">Name </label> </td>
                              <td> <input name="name" type="text" class="form-control" id="name" > </td>
                           </tr>
                              <input name="id" type="hidden" value="{{$user_id}}">
                           <tr>
                              <td> <label for="nik">NIK </label> </td>
                              <td> <input name="nik" type="text" class="form-control" id="nik" > </td>
                           </tr>
                           <tr>
                              <td> <label for="class">Class </label> </td>
                              <td> <select name="class" id="class" class="form-control">
                                 
                                 @foreach ($classes as $c)
                                    <option value="{{$c->id}}" > {{$c->class}} </option>    
                                 @endforeach
                              </select> </td>
                           </tr>
                           <tr>
                              <td> <label for="teacher">Supervisor </label> </td>
                              <td> <select name="teacher" id="teacher" class="form-control">
                                    @foreach ($teachers as $c)
                                       <option value="{{$c->id}}" > {{$c->teacher_name}} </option>    
                                    @endforeach
                                 </select> </td>
                           </tr>
                           <tr>
                              <td> <label for="city">City</label> </td>
                              <td> <select name="city" id="city" class="form-control">
                                    @foreach ($cities as $c)
                                    
                                       <option value="{{$c->id}}" > {{$c->city}} </option>    
                                    @endforeach
                              </select> </td>
                           </tr>
                           <tr>
                              <td> <label for="address">Address </label> </td>
                              <td> <input name="address" type="text" class="form-control" id="address" value=""> </td>
                           </tr>
                        </div> 
                  
                        </table>
                        <div class="card-footer bg-transparent border-secondary mt-5">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button name="submit" type="submit" class="btn btn-primary" > Save </button>
                        </div>
                     </form>  
            </div>

         </div>
      </div>
   </div>
</div>
@endsection