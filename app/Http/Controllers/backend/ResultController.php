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
            $mark=$a.$count;
            $dmark=$a.$i;
            $crdt=$c.$count;
            $dcrdt=$b.$i;
            $grade=$d.$count;
            $data->$dmark=$request->$mark;
            $data->$dcrdt=$request->$crdt;
            if($request->$mark>=80 && $request->$mark<=100){
                $data->$grade=4.00;
                $cigi=$cigi+$request->$crdt*4.00;
            }elseif($request->$mark>=75 && $request->$mark<80){
                $data->$grade=3.75;
                $cigi=$cigi+$request->$crdt*3.75;
            }elseif($request->$mark>=70 && $request->$mark<75){
                $data->$grade=3.50;
                $cigi=$cigi+$request->$crdt*3.50;
            }elseif($request->$mark>=65 && $request->$mark<70){
                $data->$grade=3.25;
                $cigi=$cigi+$request->$crdt*3.25;
            }elseif($request->$mark>=60 && $request->$mark<65){
                $data->$grade=3.00;
                $cigi=$cigi+$request->$crdt*3.00;
            }elseif($request->$mark>=55 && $request->$mark<60){
                $data->$grade=2.75;
                $cigi=$cigi+$request->$crdt*2.75;
            }elseif($request->$mark>=50 && $request->$mark<55){
                $data->$grade=2.50;
                $cigi=$cigi+$request->$crdt*2.50;
            }elseif($request->$mark>=45 && $request->$mark<50){
                $data->$grade=2.25;
                $cigi=$cigi+$request->$crdt*2.25;
            }elseif($request->$mark>=40 && $request->$mark<45){
                $data->$grade=2.00;
                $cigi=$cigi+$request->$crdt*2.00;
            }else{
                $data->$grade=0.00;
                $cigi=$cigi+$request->$crdt*0.00;
            }


        }
        $data->cigi=$cigi;
        $data->sgpa=$cigi/$request->t_credit;
        $data->save();
        return redirect()->back()->with('success','Result Inserted Successfully');
    }
}
