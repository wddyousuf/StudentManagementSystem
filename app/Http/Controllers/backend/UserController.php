<?php

namespace App\Http\Controllers\backend;

use App\Detail;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userview(){
        $db_data['all_data']=User::get();
        return view('backend.user.users',$db_data);
    }
    public function userAdd(){
        return view('backend.user.add');
    }
    public function userEdit($id){
         $data['editData']=User::find($id);
        // $data['editData1']=Detail::find($id);
        return view('backend.user.edit_user',$data);
    }
    public function userDelete($id){
        $data=User::find($id);
        if (file_exists('public/upload/user_images/' . $data->image) AND ! empty ($data->image)) {
            unlink('public/upload/user_images/'.$data->image);
        }
        $data1=Detail::find($id);
        $data->delete();
        $data1->delete();
        return redirect()->route('user.view');
    }
    public function userUpdate(Request $request,$id){
        $data=User::find($id);
        $data->role=$request->role;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->number=$request->number;
        $data->address=$request->address;
        $data->gender=$request->gender;
        $data->image=$request->image;
        $data->save();
        $data1=Detail::find($id);
        $data1->role=$request->role;
        $data1->name=$request->name;
        $data1->save();
        return redirect()->route('user.view')->with('success', 'Data Updated Successfully ');
    }
    public function userStore(Request $request){
        $this->validate($request,[
            'email'=>'unique:users,email',
        ]);
        $data=new User();
        $data->role=$request->role;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->number=$request->number;
        $data->address=$request->address;
        $data->gender=$request->gender;
        $data->password=bcrypt($request->password);
        if($request->file('image')){
            $file= $request->file('image');
            $filename=date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        $data1=new Detail();
        $data1->role=$request->role;
        $data1->name=$request->name;
        $data1->save();
        return redirect()->route('user.view')->with('success', 'Data Inserted Successfully ');
    }
}

