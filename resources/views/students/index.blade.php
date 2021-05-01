
@extends('layouts.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"> Students 
                  <a class="btn btn-success ml-5 float-right" href="{{ route('students.create') }}" id="createNewItem"> Create </a>
                </h4>
            </div>
         </div>
         <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if($students->count())
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Reporting Teacher</th>
                    <th width="20%">Action</th>
                </tr>
                @foreach ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ ucfirst($student->name) }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->teacher }}</td>
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('students.edit',$student->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="card mt-5 mb-5">
            <div class="col-md-12 mt-2 mb-2 text-center" >
                Students are not yet added! 
            </div>
            </div>
            @endif
        </div>
@endsection