<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Ruangan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index(){
        return view('index');
    }
    
    public function daftarRuangan(){
        return view('daftarRuangan',[
            'datas' => Ruangan::all()
        ]);
    }

    public function booking(){

        $bookings = Bookings::with('user', 'ruangan')->get();

        return view('booking', compact('bookings'));
    }
    
    public function status(){
        $userId = auth()->user()->id;
        
        $bookings = Bookings::where('user_id', $userId)->with('user', 'ruangan')->get();
        
        return view('status', compact('bookings'));
    }

    public function AdminBooking(){

        $bookings = Bookings::where('status', 'proses')->with('user', 'ruangan')->get();

        return view('admin.booking', compact('bookings'));
    }

    public function approveBooking(Bookings $booking){
        $booking->status = 'Disetujui';
        $booking->save();

        return redirect('/admin/bookings');
    }

    public function rejectBooking(Bookings $booking){
        $booking->status = 'Ditolak';
        $booking->save();

        return redirect('/admin/bookings');
    }
}
