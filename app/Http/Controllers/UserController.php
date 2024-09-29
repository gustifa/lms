<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.profile', compact('profileData'));
    }

    public function userProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $notification = array(
            'message' => 'User Profile Update Succesfully',
            'alert-type' => 'success',
        );

        $data->save();

        return redirect()->back()->with($notification);
    }

    public function userLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.change_password', compact('profileData'));
    }
}
