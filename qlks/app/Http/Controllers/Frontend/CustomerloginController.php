<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Kind_of_room;

class CustomerloginController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth:customer',['except' => ['index']]);
    }

    public function index()
    {
        $data['listroom'] = Kind_of_room::orderBy('id','desc')->get();
        return view('frontend.index');
    }
    public function info(){
        return view('frontend.info');
    }

}

