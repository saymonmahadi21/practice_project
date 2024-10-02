<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technicians;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $technician = Technicians::orderBy('id', 'desc')->limit(4)->get();
        $services = Service::orderBy('id','desc')->get();
        
        return view('pages.home', ['data'=>$technician, 'services'=>$services]);
    }
}
