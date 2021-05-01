@extends('layouts.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"><strong>Create - </strong> Student  
                  <a class="btn btn-success ml-5 " href="{{ route('students.index') }}">Back</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
               
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
              
                 <div class="row">
              
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Age:</strong>
                            <input type="number" name="age" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Gender :</strong>
                           
                        <select name="gender" class="form-control">
						<option value="">Select Gender</option>
						<option> F </option>
						<option> M </option>
					    </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Reporting Teacher:</strong>
                            
                        <select name="teacher" class="form-control">
						<option value="">Select Teacher</option>
						<option> Katie </option>
						<option> Max </option>
					    </select>
                        </div>
                    </div>
        
                    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
@endsection