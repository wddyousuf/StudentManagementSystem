<?php

namespace App\Http\Controllers\backend;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function add(){
        return view('backend.course.register');
    }
    public function store(Request $request){
        $data=new Course();
        $data->year=$request->year;
        $data->semester=$request->smstr;
        $data->courseName=$request->crsname;
        $data->courseCode=$request->crscode;
        $data->credit=$request->credit;
        $data->instructor=$request->instrctr;
        $data->session=$request->crssession;
        $data->save();
        return redirect()->route('course.view')->with('success', 'Course Registered for this session Successfully ');
    }
    public function view(){
        $data['courses']=Course::all();
        return view('backend.course.view',$data);
    }
    public function delete($id){
        $data=Course::find($id);
        $data->delete();
        return redirect()->route('course.view')->with('Success','Course Deleted Successfully');
    }
    public function edit($id){
        $data['editData']=Course::find($id);
        return view('backend.course.register',$data);
    }
    public function update(Request $request,$id){
        $data=Course::find($id);
        $data->year=$request->year;
        $data->semester=$request->smstr;
        $data->courseName=$request->crsname;
        $data->courseCode=$request->crscode;
        $data->credit=$request->credit;
        $data->instructor=$request->instrctr;
        $data->session=$request->crssession;
        $data->save();
        return redirect()->route('course.view')->with('success', 'Course Edited Successfully ');
    }
}
