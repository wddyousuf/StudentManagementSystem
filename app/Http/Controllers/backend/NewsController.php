<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\News;

class NewsController extends Controller
{
    public function view(){
        $db_data['all_data']=News::get();
        return view('backend.news.view',$db_data);
    }
    public function add(){
        return view('backend.news.add');
    }
    public function edit($id){
        $editData=News::find($id);
        return view('backend.news.edit',compact('editData'));
    }
    public function delete($id){
        $data=News::find($id);
        if (file_exists('upload/news/' . $data->image) AND ! empty ($data->image)) {
            unlink('upload/news/'.$data->image);
        }
        $data->delete();
        return redirect()->route('news.view')->with('success','News and Event Deleted Successfully');
    }
    public function update(Request $request,$id){
        $data=News::find($id);
        $data->date=date('Y-m-d',strtotime($request->date));
        if($request->file('image')){
            $file= $request->file('image');
            @unlink(\public_path('upload/news/'.$data->image));
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news'),$filename);
            $data['image']=$filename;
        }
        $data->title=$request->title;
        $data->description=$request->description;
        $data->updated_by=Auth::user()->id;
        $data->save();
        return redirect()->route('news.view')->with('success', 'News and Event Updated Successfully ');
    }
    public function store(Request $request){
        $data=new News();
        $data->date=date('Y-m-d',strtotime($request->date));
        if($request->file('image')){
            $file= $request->file('image');
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news'),$filename);
            $data['image']=$filename;
        }
        $data->title=$request->title;
        $data->description=$request->description;
        $data->created_by=Auth::user()->id;
        $data->save();
        return redirect()->route('news.view')->with('success', 'News and Event Inserted Successfully');
    }
}
