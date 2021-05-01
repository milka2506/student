@extends('layouts.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"><strong>Edit - </strong> Student Marks
                  <a class="btn btn-success ml-5" href="{{ route('studentdetails.index') }}">Back</a>
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
               
            <form action="{{ route('studentdetails.update',$studentdetail->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                            <strong>Student Name:</strong>
                            <select class="form-control" name="student_id">
                                @foreach ($students as $key => $value)
                                    <option value="{{ $key }}"  <?php if($key==$studentdetail->student_id){echo "selected";}?>> 
                                        {{ $value }} 
                                    </option>
                                @endforeach    
                                </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Maths:</strong>
                            <input type="number" name="maths"  value="{{ $studentdetail->maths }}" class="form-control" placeholder="Maths">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Science:</strong>
                            <input type="number" name="science"  value="{{ $studentdetail->science }}" class="form-control" placeholder="Science">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>History:</strong>
                            <input type="number" name="history"  value="{{ $studentdetail->history }}" class="form-control" placeholder="History">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Term:</strong>
                        <select name="term" class="form-control">
						<option value="">Select Term</option>
						<option <?php if($studentdetail->term=="One"){echo "selected";}?>>One</option>
                        <option <?php if($studentdetail->term=="Two"){echo "selected";}?>>Two</option>
                        <option <?php if($studentdetail->term=="Three"){echo "selected";}?>>Three</option>
					    </select>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
@endsection