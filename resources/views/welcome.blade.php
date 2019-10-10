@extends('layouts.app')

@section('content')
{{-- {{dd($students)}} --}}
    <!-- Dashboard -->
    <div class="col-md-10 col-sm-8 mt-4">
        <div class="row  dashboard justify-content-center">       
            <div class="card " style="margin: 5% 0%">
                <div class="card-header">
                    <b>System Information of Elementary School</b>
                </div>
                <div class="card-body text-center">
                    <p>Welcome to System Information of Elementary School.</p>
                </div>
            </div>
        </div>
            <div class="row justify-content-center dashboard">
                <?php //var_dump($students)?>
                {{-- {{dd($students)}} --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Students
                        </div>
                        <div class="card-body bg-info">
                            <h5 class="card-title">Data of All Students</h5>
                            <p class="card-text"> Count of Students : {{count( $students )}} </p>
                        <a href="{{route('students')}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>         
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Teachers
                    </div>
                    <div class="card-body bg-success">
                        <h5 class="card-title">Data of All Teachers</h5>
                        <p class="card-text">Count of Teachers : {{count( $teachers )}}</p>
                        <a href="{{route('teachers')}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Classes
                    </div>
                    <div class="card-body bg-secondary">
                        <h5 class="card-title">Data of Classes</h5>
                        <p class="card-text">Count of Classes : {{count( $classes )}}</p>
                        <a href="{{route('classes')}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
                </div>      
            </div>               
        </div>
    </div>
</div>
@endsection
