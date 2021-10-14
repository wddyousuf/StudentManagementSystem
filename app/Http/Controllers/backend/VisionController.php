<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Vision;

class VisionController extends Controller
{
    public function view(){
        $db_data['countvision']=Vision::count();
        $db_data['all_data']=Vision::get();
        return view('backend.vision.view',$db_data);
    }
    public function add(){
        return view('backend.vision.add');
    }
    public function edit($id){
        $editData=Vision::find($id);
        return view('backend.vision.edit',compact('editData'));
    }
    public function delete($id){
        $data=Vision::find($id);
        if (file_exists('upload/vision/' . $data->image) AND ! empty ($data->image)) {
            unlink('upload/vision/'.$data->image);
        }
        $data->delete();
        return redirect()->route('vision.view')->with('success','Vision Deleted Successfully');
    }
    public function update(Request $request,$id){
        $data=Vision::find($id);
        if($request->file('image')){
            $file= $request->file('image');
            @unlink(\public_path('upload/vision/'.$data->image));
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision'),$filename);
            $data['image']=$filename;
        }
        $data->description=$request->description;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('vision.view')->with('success', 'Vision Updated Successfully ');
    }
    public function store(Request $request){
        $data=new Vision();
        if($request->file('image')){
            $file= $request->file('image');
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision'),$filename);
            $data['image']=$filename;
        }
        $data->description=$request->description;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('vision.view')->with('success', 'Vision Inserted Successfully');
    }
}
