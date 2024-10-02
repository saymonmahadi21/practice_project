<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function serviceStore(Request $req){

        if($req->title === $req->subtitle){
            Alert::error('Error', 'Title and subtitle can not be same!');
        }else{
            
        }

        if (!(public_path('back/img'))) {
            mkdir(public_path('back/img'), 0777, true);
        }

        if ($req->image) {
            $image = $req->image;
            $name = $image->getClientOriginalName(); 
            $imagename = time() . "" . $name;
            $destination = public_path('back/img');
            $image->move($destination, $imagename);
            $data['image'] = 'back/img/'.$imagename;
        }

        $data['title'] = $req->title;
        $data['subtitle'] = $req->subtitle;
        $data['description'] = $req->short_description;
        $data['quality_servicing'] = $req->quality_servicing === "on" ? true : false;
        $data['expert_workers'] = $req->expert_workers === "on" ? true : false;
        $data['modern_equipment'] = $req->modern_equipment === "on" ? true : false;

        Service::create($data);

        Alert::success('Success', 'Service added successfully');


        return redirect()->back();

    }

    public function serviceList(){
        return view('pages.back.services.list');
    }
}
