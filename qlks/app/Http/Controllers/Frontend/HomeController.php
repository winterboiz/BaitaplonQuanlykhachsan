<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Kind_of_room;
use App\Mail\OrderShipped;
use App\Order;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use Illuminate\Support\Facades\DB;
use App\Orderdetail;
use Laravel\Socialite\Facades\Socialite;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $except= array('logout','Roomdetail','Listroom','about','checkRoom','datphong','checkRoom2','checkInfoCustomer','postReservation','redirectToFacebook','handleFacebookCallback');
        $this->middleware('guest:customer',['except' => $except]);
    }

    /**
     * Trang chủ
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
//        try {
//            $user = Socialite::driver('facebook')->user();
//            $create['hoten'] = $user->getName();
//            $create['email'] = $user->getEmail();
//            $create['facebook_id'] = $user->getId();
//
//
//            $userModel = new User;
//            $createdUser = $userModel->addNew($create);
//            Auth::loginUsingId($createdUser->id);
//
//
//            return redirect()->route('frontend.home.index');
//
//
//        } catch (Exception $e) {
//
//
//            return redirect('auth/facebook');
//
//
//        }
            $user = Socialite::driver('facebook')->user();
            $authUser = Customer::where('id',$user->id)->first();
            if($authUser){
                Auth::guard('customer')->loginUsingId($user->id);

                return redirect()->route('frontend.home.index');
            }else{
                $create['tenkhachhang'] = $user->getName();
                $create['email'] = $user->getEmail();
                $create['facebook_id'] = $user->getId();


                $userModel = new Customer();
                $createdUser = $userModel->addNew($create);
                Auth::guard('customer')->loginUsingId($createdUser->id);


                return redirect()->route('frontend.home.index');

            }

    }

    public function Roomdetail(){
        return view('frontend.room_detail');
    }
    public function Listroom(){
        return view('frontend.list-room');
    }
    public function getRegister(){
        return view('frontend.register');
    }

    public function about(){

       return view('frontend.about');
    }
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('/');

    }
    public function getLogin(){
        if (Auth::guard('customer')->check()) {
            return redirect('/');
        }else{
            return view('frontend.login');
        }

    }
    public function checkRoom(Request $request){
        $data['ngayden']= $request->input('ngayden');
        $data['ngaytra']= $request->input('ngaytra');
//        $data['phong'] = Kind_of_room::with(['rooms' => function($query){
//            $query->where('tinhtrang','0');
//        }])->get()->toArray();


//        dd($data['phong2']);
        $data['phong'] = DB::table('loaiphong')->select('loaiphong.id','giatien','tenloaiphong')
            ->join('phong', 'phong.loaiphong_id', '=', 'loaiphong.id')
            ->where('tinhtrang',0)
            ->get();

        return view('frontend.datphong',$data);
    }

    public  function checkRoom2($id){
        $data = Room::select('id','tenphong')->where([
            ['loaiphong_id','=',$id ],
            ['tinhtrang','=','0']
        ])->get();


        return Response::json($data);
    }

    public function checkInfoCustomer(Request $request){
        $data['ngayden'] =$request->input('ngayden');
        $data['ngaytra']=$request->input('ngaytra');
        $data['phong_id']=$request->input('maphong');
        $data['thongtin']= Room::with(['loaiphong'=> function($q){
            $q->select('id','tenloaiphong','giatien');
        }])->find($data['phong_id']);



        return view('frontend.thongtindatphong',$data);

    }
    public function postReservation(Request $request){


        $valid = Validator::make($request->all(), [
            'hoten' => 'required',
            'sdt' => 'required',
            'cmnd' => 'required',
            'email' => 'required',

        ], [
            'hoten.required' => 'Vui Lòng Nhập Username',
            'sdt.required' => 'Vui Lòng Nhập Password',
        ]);
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
                $khachhang_id = $request->input('khachhang_id');
                if(isset($khachhang_id) && !empty($khachhang_id )){

                    $customer = Customer::find($khachhang_id);
                    if($request->has('cmnd')){
                        $customer->cmnd = $request->input('cmnd');
                    }
                    if($request->has('sdt')){
                        $customer->dienthoai = $request->input('sdt');
                    }
                    if($request->has('email')){
                        $customer->email = $request->input('email');
                    }
                    $customer->save();

                    $order = Order::create([
                        'khachhang_id' => $request->input('khachhang_id'),
                        'phong_id' => $request->input('maphong'),
                        'ngaydat' => $request->input('ngaydat'),
                        'ngaytra' =>$request->input('ngaytra')
                    ]);


                    $phong = Room::find($request->input('maphong'));
                    $phong->tinhtrang = 1;
                    $phong->save();





                    return view('frontend.comfirm')->with('message', "Cập nhật  thành công");
                }else{

                    $khachhang = New Customer();
                    $khachhang->tenkhachhang = $request->input('hoten');
                    $khachhang->diachi = $request->input('diachi');
                    $khachhang->dienthoai = $request->input('sdt');
                    $khachhang->cmnd = $request->input('cmnd');
                    $khachhang->email = $request->input('email');
                    $khachhang->save();

                    $order = Order::create([
                        'khachhang_id' =>  $khachhang->id,
                        'phong_id' => $request->input('maphong'),
                        'ngaydat' => $request->input('ngaydat'),
                        'ngaytra' =>$request->input('ngaytra')
                    ]);

                    $phong = Room::find($request->input('maphong'));
                    $phong->tinhtrang = 1;
                    $phong->save();

                    Mail::to($khachhang->email)
                        ->send(new OrderShipped($order));

                    return view('frontend.comfirm')->with('message', "Cập nhật thành công");


                }
        }

    }


    public function postLogin(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'

        ], [
            'username.required' => 'Vui Lòng Nhập Tài Khoản',
            'password.required' => 'Vui Lòng Nhập Mật Khẩu',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            if (Auth::guard('customer')->attempt(['username' => $request->username, 'password' => $request->password])) {

               return redirect()->back();

            } else {
                return redirect()->back()->with('error', 'Tài Khoản hoặc mật khẩu không đúng');;

            }

        }
    }
    public function datphong(){
        return view('frontend.datphong');
    }

    public function getListroom(){


    }
}
