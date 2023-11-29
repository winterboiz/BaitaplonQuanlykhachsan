<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){
        $data['phong'] = Room::all()->where('tinhtrang',2)->count();
        $data['order'] = Order::all()->where('tinhtrang',0)->count();
        $data['phongtrong'] =Room::all()->where('tinhtrang',0)->count();
        $data['tongtien']= Bill::all()->sum('tongtien');
        return view('admin.home',$data);
    }
}
