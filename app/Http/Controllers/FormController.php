<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FormController extends Controller
{
    public function form(){
        return view('pages.form');
    }

    public function crateUser(Request $req){
        $data["name"] = $req->fullName;
        $data["phone"] = $req->userPhone;
        $data["email"] = $req->userEmail;
        $data["address"] = $req->userAddress;
        $data["age"] = $req->userAge;
        $data["gender"] = $req->userGender;

        User::create($data);
    }
}
