<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Service;

class ServiceController extends Controller
{
    public function view(){
        $db_data['all_data']=Service::get();
        return view('backend.service.view',$db_data);
    }
    public function add(){
        return view('backend.service.add');
    }
    public function edit($id){
        $editData=Service::find($id);
        return view('backend.service.edit',compact('editData'));
    }
    public function delete($id){
        $data=Service::find($id);
        $data->delete();
        return redirect()->route('services.view')->with('success','service and Event Deleted Successfully');
    }
    public function update(Request $request,$id){
        $data=Service::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('services.view')->with('success', 'Service and Event Updated Successfully ');
    }
    public function store(Request $request){
        $data=new Service();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('services.view')->with('success', 'Service and Event Inserted Successfully');
    }
}
