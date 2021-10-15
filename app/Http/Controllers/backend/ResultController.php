<?php

namespace App\Http\Controllers\backend;

use App\Course;
use App\Http\Controllers\Controller;
use App\Result;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function make(){
        return view('backend.result.make');
    }
    public function queries(Request $request){
        $year=$request->year;
        $semester=$request->smstr;
        $roll=$request->roll;
        $std=DB::table('students')->where('roll',$roll)->first();
        $data['course']=DB::table('courses')->where('year',$year)->where('semester',$semester)->where('session',$std->session)->get();
        $data['att_query']=DB::table('students')->where('year',$year)->where('semester',$semester)->where('roll',$roll)->get()->last();
        return view('backend.result.add',$data);
    }
    public function store(Request $request){
        $a="crs";
        $b="cr";
        $c="credit";
        $d="grade";
        $data=new Result();
        $count=0;
        $data->roll=$request->roll;
        $data->year=$request->year;
        $data->semester=$request->semester;
        $data->totalCredit=$request->t_credit;
        $cigi=0;
        $std=DB::table('students')->where('roll',$request->roll)->first();
        $course=DB::table('courses')->where('year',$request->year)->where('semester',$request->semester)->where('session',$std->session)->count();
        for($i=1;$i<=$course;$i++){
            $count++;
            $data->$a.$i=$request->$a.$count;
            $data->$b.$i=$request->$c.$count;
            if($request->$a.$count>=80 && $request->$a.$count<=100){
                $data->$d.$count=4.00;
                $cigi=$cigi+$request->$c.$count*4.00;
            }elseif($request->$a.$count>=75 && $request->$a.$count<80){
                $data->$d.$count=3.75;
                $cigi=$cigi+$request->$c.$count*3.75;
            }elseif($request->$a.$count>=70 && $request->$a.$count<75){
                $data->$d.$count=3.50;
                $cigi=$cigi+$request->$c.$count*3.50;
            }elseif($request->$a.$count>=65 && $request->$a.$count<70){
                $data->$d.$count=3.25;
                $cigi=$cigi+$request->$c.$count*3.25;
            }elseif($request->$a.$count>=60 && $request->$a.$count<65){
                $data->$d.$count=3.00;
                $cigi=$cigi+$request->$c.$count*3.00;
            }elseif($request->$a.$count>=55 && $request->$a.$count<60){
                $data->$d.$count=2.75;
                $cigi=$cigi+$request->$c.$count*2.75;
            }elseif($request->$a.$count>=50 && $request->$a.$count<55){
                $data->$d.$count=2.50;
                $cigi=$cigi+$request->$c.$count*2.50;
            }elseif($request->$a.$count>=45 && $request->$a.$count<50){
                $data->$d.$count=2.25;
                $cigi=$cigi+$request->$c.$count*2.25;
            }elseif($request->$a.$count>=40 && $request->$a.$count<45){
                $data->$d.$count=2.00;
                $cigi=$cigi+$request->$c.$count*2.00;
            }else{
                $data->$d.$count=0.00;
                $cigi=$cigi+$request->$c.$count*0.00;
            }


        }
        $data->cigi=$cigi;
        $data->sgpa=$cigi/$request->t_credit;
        $data->save();
        return redirect()->back()->with('success','Result Inserted Successfully');
    }
}
