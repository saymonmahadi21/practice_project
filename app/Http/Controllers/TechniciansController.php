<?php

namespace App\Http\Controllers;

use App\Models\Technicians;
use Illuminate\Http\Request;

class TechniciansController extends Controller
{
    public function techniciansAdd(){
        return view('pages.back.technicians.add');
    }

    public function techniciansStore(Request $request){

        if (!(public_path('back/img/technicians'))) {
            mkdir(public_path('back/img/technicians'), 0777, true);
        }

        if ($request->image) {
            $image = $request->image;
            $name = $image->getClientOriginalName(); 
            $imagename = time() . "" . $name;
            $destination = public_path('back/img/technicians');
            $image->move($destination, $imagename);
            $data['image'] = 'back/img/technicians/'.$imagename;
        }

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;

        Technicians::create($data);
        return redirect()->route('technicians.list');

    }

    public function techniciansList(){
        $data = Technicians::orderBy('id', 'desc')->get();

        return view('pages.back.technicians.list', ['technicians'=> $data]);
    }

    public function technicianEdit($id){
        $technician = Technicians::where(['id'=>$id])->first();

        return view('pages.back.technicians.edit', ['data'=> $technician]);
    }

    public function technicianUpdate(Request $request){
        if (!(public_path('back/img/technicians'))) {
            mkdir(public_path('back/img/technicians'), 0777, true);
        }

        if ($request->image) {
            $image = $request->image;
            $name = $image->getClientOriginalName(); 
            $imagename = time() . "" . $name;
            $destination = public_path('back/img/technicians');
            $image->move($destination, $imagename);
            $data['image'] = 'back/img/technicians/'.$imagename;
        }

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;

        Technicians::where(['id'=>$request->id])->update($data);
        return redirect()->route('technicians.list');
    }

    public function technicianDelete($id){
        Technicians::where(['id'=>$id])->delete();

        return redirect()->back();
    }
}
