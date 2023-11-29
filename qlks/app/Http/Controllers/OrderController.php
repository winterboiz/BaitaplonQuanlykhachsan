<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use App\Checkin;
use Illuminate\Database\Capsule\Manager;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['phongs']= Room::select('id','tenphong')
//            ->where('tinhtrang','=','0')
            ->get();
        return view('admin.datphong.index',$data);
    }


    public function datalistroder(){
//        $sql = 'SELECT datphong.id,tenkhachhang,tenphong,ngaydat,ngaytra,datphong.created_at FROM khachhang,phong,datphong,chitietdatphong WHERE khachhang.id = datphong.khachhang_id and datphong.id=chitietdatphong.datphong_id and chitietdatphong.phong_id=phong.id';
//        $datphong = DB::SELECT($sql);
        $datphong = Order::with('phong','customer');
        $datatables = DataTables::of($datphong)
            ->addColumn('action', function ($datphong) {

               if($datphong->tinhtrang == 0){
                   return view('admin.modal.btn-add-modal',
                       [
                           'edit' => '#edit_order',
                           'delete_' => '#delete_order',
                           'id' => $datphong->id,
                           'phong_id' => $datphong->phong->id,
                           'urlEdit' => route('admin.datphong.update',['id' => $datphong->id]),
                           'delete' => route('admin.datphong.delete', ['id' => $datphong->id]),
                           'detail' => route('admin.datphong.show',['id' => $datphong->id]),
                       ]);
               }
                return view('admin.modal.btn-show-modal',
                    [
                        'show' => '#show_order',
                        'delete_' => '#delete_order',
                        'id' => $datphong->id,
                        'detail' => route('admin.datphong.show',['id' => $datphong->id]),
                    ]);

            })
            ->editColumn('created_at',function (Order $datphong){
                return $datphong->created_at ? with(new Carbon($datphong->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('ngaytra',function (Order $datphong){
                return $datphong->ngaytra ? with(new Carbon($datphong->ngaytra))->format('d/m/Y') : '';
            })
            ->editColumn('ngaydat',function (Order $datphong){
                return $datphong->ngaydat ? with(new Carbon($datphong->ngaydat))->format('d/m/Y') : '';
            })
            ->editColumn('tinhtrang',function (Order $datphong) {
                if ($datphong->tinhtrang == 1) {
                    return '<span class="label label-success">Đã Xong</span>';
                }
                return '<span class="label label-warning">Đang Chờ</span>';
            })
//            ->addColumn('tenphong',function (Order $datphong){
//                $tenphong='';
//                foreach ($datphong->rooms as $room){
//                    $tenphong= $room->tenphong;
//                }
//                return $tenphong;
//            })
            ->rawColumns(['ngaydat','ngaytra','created_at','action','tinhtrang']);

        return $datatables->make(true);

    }


    public function show($id){
        $order = Order::with('phong','customer')->find($id);
        return response()->json([
            'id' => $order->id,
            'tenkhachhang' => $order->customer->tenkhachhang,
            'cmnd' => $order->customer->cmnd,
            'sodienthoai' => $order->customer->dienthoai,
            'gioitinh' => $order->customer->gioitinh,
            'email' => $order->customer->email,
            'khachhang_id' => $order->khachhang_id,
            'phong_id' => $order->phong_id,
            'ngaydat' => $order->ngaydat,
            'ngaytra' => $order->ngaytra
        ]);

    }
    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:khachhang,tenkhachhang',
            'dienthoai' => 'required|numeric',
            'cmnd' => 'required|numeric',
            'gioitinh' => 'required',
            'diachi' => 'required',
            'phong_id' => 'required|exists:phong,id'

        ], [
            'name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'name.unique' => 'Tên này đã trùng',
            'gioitinh.required' => 'Vui Lòng Chọn Giới tính',
            'diachi.required' => 'Vui Lòng Nhập Địa Chỉ',
            'dienthoai.required' => 'Vui Lòng Nhập Điện Thoại',
            'cmnd.required' => 'Vui Lòng Nhập CMND',
            'phong_id.required' => 'Vui Lòng Chọn Phòng',
            'dienthoai.numeric' => 'Điện Thoại Phải Là Số',
            'cmnd.numeric' => 'CMND Phải Là Số',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{

            $ngaydat = $request->input('checkin');
            $ngaytra =$request->input('checkout');
            $phong_id = $request->input('phong_id');


            $khachhang = New Customer();
            $khachhang->tenkhachhang = $request->input('name');
            $khachhang->diachi = $request->input('diachi');
            $khachhang->dienthoai = $request->input('dienthoai');
            $khachhang->cmnd = $request->input('cmnd');
            $khachhang->gioitinh = $request->input('gioitinh');
            $khachhang->user_id = auth()->id();
            $khachhang->save();

            $datphong = Order::create([
                'khachhang_id' => $khachhang->id,
                'phong_id' => $phong_id,
                'ngaydat' => Carbon::parse($ngaydat)->format('Y/m/d'),
                'ngaytra' => Carbon::parse($ngaytra)->format('Y/m/d')
            ]);

            $phong = Room::find($phong_id);
            $phong->tinhtrang = 1;
            $phong->save();

            return Response::json(['success' => '1']);
        }
    }
    public function update(Request $request){
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_dienthoai' => 'required|numeric',
            'edit_cmnd' => 'required|numeric',
            'edit_phong_id' => 'required|exists:phong,id'

        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'edit_name.unique' => 'Tên này đã trùng',
            'edit_dienthoai.required' => 'Vui Lòng Nhập Điện Thoại',
            'edit_cmnd.required' => 'Vui Lòng Nhập CMND',
            'edit_phong_id.required' => 'Vui Lòng Chọn Phòng',
            'edit_dienthoai.numeric' => 'Điện Thoại Phải Là Số',
            'edit_cmnd.numeric' => 'CMND Phải Là Số',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{

            $ngaydat = $request->input('edit_checkin');
            $ngaytra =$request->input('edit_checkout');
            $phong_id = $request->input('edit_phong_id');

            $checkin = Checkin::create([
                 'khachhang_id' => $request->input('edit_khachhang_id'),
                 'phong_id' => $request->input('edit_phong_id'),
                 'ngaydat' => $ngaydat,
                 'ngaytra' => $ngaytra,
                 'user_id' => auth()->id()

             ]);

            if($checkin){
                $datphong = Order::find($request->input('edit_id'));
                $datphong->tinhtrang = 1;
                $datphong->save();
                $phong = Room::find($phong_id);
                $phong->tinhtrang = 2;
                $phong->save();


            }
            return Response::json(['success' => '1']);
        }
    }



    public function delete($id){

        $order = Order::findOrFail($id);
        if ($order !== null) {

                $phong_id = Room::find($order->phong_id);
                $phong_id->tinhtrang = 0;
                $phong_id->save();

            $order->delete();
            return Response::json(['success' => '1']);
        }
    }


}
