
@extends('layouts.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"> Student-Marks
                  <a class="btn btn-success ml-5 float-right" href="{{ route('studentdetails.create') }}" id="createNewItem"> Create</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if($studentdetails->count())
            <table class="table table-bordered">
                <tr>
                <th width="5%">No</th>
                    <th>Name</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>History</th>
                    <th>Term</th>
                    <th>Total Marks</th>
                    <th>Created On </th>
                    <th width="20%">Action</th>
                </tr>
                @foreach ($studentdetails as $studentdetail)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ ucfirst($studentdetail->student->name) }}</td>
                    <td>{{ $studentdetail->maths }}</td>
                    <td>{{ $studentdetail->science }}</td>
                    <td>{{ $studentdetail->history }}</td>
                    <td>{{ $studentdetail->term }}</td>
                    <td>{{ $studentdetail->total }}</td>
                    <td>{{ \Carbon\Carbon::parse($studentdetail->created_at)->isoFormat('MMMM D, YYYY ')}}<br>{{ \Carbon\Carbon::parse($studentdetail->created_at)->isoFormat(' hh:mm A')}}</td>
                    <td>
                        <form action="{{ route('studentdetails.destroy',$studentdetail->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('studentdetails.edit',$studentdetail->id) }}">Edit</a>
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
                Student Marks are not yet added! 
            </div>
            </div>
            @endif
        </div>
@endsection