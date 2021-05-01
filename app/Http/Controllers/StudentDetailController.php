<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use Yajra\Datatables\Datatables;

class StudentDetailController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentdetails = StudentDetail::latest()->paginate(5);
  
        return view('studentdetails.index',compact('studentdetails'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $students = Student::pluck('name', 'id');
        return view('studentdetails.create',compact('students'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
            'term' => 'required',
        ]);
  
        $data = $request->all(); 
        $data['total'] = $request->maths + $request->science + $request->history; 
        StudentDetail::create($data);
        return redirect()->route('studentdetails.index')
                        ->with('success','Student Marks created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetail  $StudentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDetail $studentdetail)
    {
        $students = Student::pluck('name', 'id');
        return view('studentdetails.edit',compact('studentdetail','students'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetail  $StudentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDetail $studentdetail)
    {
        $request->validate([
            'student_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
            'term' => 'required',
        ]);
  
        $studentdetail->update($request->all());
  
        return redirect()->route('studentdetails.index')
                        ->with('success','Student Marks updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetail  $StudentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDetail $studentdetail)
    {
        $studentdetail->delete();
  
        return redirect()->route('studentdetails.index')
                        ->with('success','Student Marks deleted successfully');
    }
}