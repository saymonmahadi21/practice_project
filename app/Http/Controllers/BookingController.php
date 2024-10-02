<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function bookingStore(Request $req){


        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['service_id'] = $req->service_id;
        $data['date'] = $req->date;
        $data['special_request'] = $req->description;

        Booking::create($data);

        Alert::success('Success', 'Your booking request has been successfully sent');

        return redirect()->back();
    }

    public function bookingList(){
        $bookings = Booking::with('service')->get();
        // return $bookings;

        // dd($bookings->all());

        return view('pages.back.bookings.list', ['bookings'=>$bookings]);
    }
}
