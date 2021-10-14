<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Mission;

class MissionController extends Controller
{
    public function view(){
        $db_data['countmission']=Mission::count();
        $db_data['all_data']=Mission::get();
        return view('backend.mission.view',$db_data);
    }
    public function add(){
        return view('backend.mission.add');
    }
    public function edit($id){
        $editData=Mission::find($id);
        return view('backend.mission.edit',compact('editData'));
    }
    public function delete($id){
        $data=Mission::find($id);
        if (file_exists('upload/mission/' . $data->image) AND ! empty ($data->image)) {
            unlink('upload/mission/'.$data->image);
        }
        $data->delete();
        return redirect()->route('mission.view')->with('success','Mission Deleted Successfully');
    }
    public function update(Request $request,$id){
        $data=Mission::find($id);
        if($request->file('image')){
            $file= $request->file('image');
            @unlink(\public_path('upload/mission/'.$data->image));
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission'),$filename);
            $data['image']=$filename;
        }
        $data->description=$request->description;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('mission.view')->with('success', 'Mission Updated Successfully ');
    }
    public function store(Request $request){
        $data=new Mission();
        if($request->file('image')){
            $file= $request->file('image');
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission'),$filename);
            $data['image']=$filename;
        }
        $data->description=$request->description;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('mission.view')->with('success', 'Mission Inserted Successfully');
    }
}
