<?php

namespace App\Http\Controllers\backend;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function take(){
        return view('backend.attendance.take');
    }
    public function queries(Request $request){
        $year=$request->year;
        $semester=$request->smstr;
        $data['att_query']=DB::table('students')->where('year',$year)->where('semester',$semester)->get();
        return view('backend.attendance.get',$data);
    }
    public function store(Request $request){

        foreach ($request->roll as  $value) {
            $std=Student::where('roll',$value)->first();
            $atts[]=[
                "year"=>$std->year,
                "semester"=>$std->semester,
                "roll"=>$std->roll,
                "status"=>$request->atndnc[$value],
                "date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "session"=>$std->session
            ];
        }
        $data=DB::table('attendances')->insert($atts);
        return redirect()->route('attendance.take')->with('success', 'Attendance Taken Successfully ');
    }
    public function view(){
        return view('backend.attendance.view');
    }
    public function queriess(Request $request){
        $data['year']=$request->year;
        $data['semester']=$request->smstr;
        $data['att_query']=DB::table('attendances')->where('year',$request->year)->where('semester',$request->smstr)->distinct()->get(['date']);
        return view('backend.attendance.att_by_date',$data);
    }
    public function viewbydate($date,$year,$semester){
        $data['att_query']=DB::table('attendances')->where('year',$year)->where('semester',$semester)->where('date',$date)->get();
        return view('backend.attendance.attviewatdate',$data);
    }
    public function edit($date,$year,$semester){
        $data['editData']=DB::table('attendances')->where('year',$year)->where('semester',$semester)->where('date',$date)->get();
        return view('backend.attendance.get',$data);
    }
    public function update(Request $request){
        foreach ($request->id as  $value) {
            $std=Attendance::where('id',$value)->first();
            $atts=[
                "status"=>$request->atndnc[$value]
            ];
            $data=DB::table('attendances')->update($atts);
        }

        return redirect()->route('attendance.view')->with('success', 'Attendance Updated Successfully ');
    }
}
