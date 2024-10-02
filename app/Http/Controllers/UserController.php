<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userStore(Request $request_data)
    {
        $request_data->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if (!(public_path('front/img/new'))) {
            mkdir(public_path('front/img/new'), 0777, true);
        }

        if ($request_data->profile_image) {
            $image = $request_data->profile_image;
            $name = $image->getClientOriginalName(); 
            $imagename = time() . "" . $name;
            $destination = public_path('front/img/new');
            $image->move($destination, $imagename);
            $user['image'] = 'front/img/new/'.$imagename;
        }

        $user = [
            "name" => $request_data->full_name,
            "email" => $request_data->email,
            "phone" => $request_data->phone,
            "address" => $request_data->address,
            "password" => Hash::make($request_data->password)
        ];

        User::create($user);
        return  redirect()->route('login');
    }

    public function loginCheck(Request $req){

        // if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
        //     if(Auth::user()->isAdmin == 1){
        //         dd("Admin");
        //     }else{
        //         dd("User");
        //     }
        // }else{
        //     dd("Invalid credentials");
        // }

        if(Auth::attempt(['email'=> $req->email, 'password' => $req->password])){
            if(Auth::user()->isAdmin === 1){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->back();
    }
}
