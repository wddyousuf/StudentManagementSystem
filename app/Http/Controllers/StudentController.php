<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentview(){
        $db_data['all_data']=Student::get();
        return view('backend.student.students',$db_data);
    }
    public function studentAdd(){
        return view('backend.student.add');
    }
    public function studentEdit($id){
         $data['editData']=Student::find($id);
        return view('backend.student.edit_student',$data);
    }
    public function studentDelete($id){
        $data=Student::find($id);
        if (file_exists('public/upload/student_images/' . $data->photo) AND ! empty ($data->photo)) {
            unlink('public/upload/student_images/'.$data->photo);
        }
        $data->delete();
        return redirect()->route('student.view');
    }
    public function studentUpdate(Request $request,$id){
        $data=Student::find($id);
        $data->name=$request->name;
        $data->year=$request->year;
        $data->semester=$request->smstr;
        $data->session=$request->session;
        $data->roll=$request->roll;
        $data->reg_no=$request->reg_no;
        $data->mobile=$request->number;
        $data->address=$request->address;
        if($request->file('image')){
            $file= $request->file('image');
            @unlink(\public_path('upload/student_images/'.$data->photo));
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        return redirect()->route('student.view')->with('success', 'Data Updated Successfully ');
    }
    public function studentStore(Request $request){
        $data=new Student();
        $data->name=$request->name;
        $data->year=$request->year;
        $data->semester=$request->smstr;
        $data->session=$request->session;
        $data->roll=$request->roll;
        $data->reg_no=$request->reg_no;
        $data->mobile=$request->number;
        $data->address=$request->address;
        if($request->file('image')){
            $file= $request->file('image');
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        return redirect()->route('student.view')->with('success', 'Data Inserted Successfully ');
    }
}
