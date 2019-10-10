@extends('layouts/app')

@section('content')
<div class="col-md-12 col-sm-8 mt-4">
        <div class="row justify-content-center dashboard">
            <div class="col-md-8">
                <div class="card border-secondary mb-3" >
        
                    <div class="card-header bg-transparent border-secondary text-center">
                    <h5 class="card-title">Add new Class</h5>
                    </div>
                    <div class="card-body text-secondary ">
        
                    <form action="{{route('class/insert')}}" method="post">
                        @csrf
                        {{-- {{dd($classes)}} --}}
                        <div class="form-group">
                            <label for="class">Class Name</label>
                            <input name="class" type="text" class="form-control" id="class" placeholder="1 B">
                        </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>

                    </div>

            </div>
        </div>
    </div>
</div>

@endsection