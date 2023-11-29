<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:khachhang-list',['only' => ['index']]);
        $this->middleware('permission:khachhang-update', ['only' => ['update','store']]);
        $this->middleware('permission:khachhang-delete', ['only' => ['delete']]);
    }

    public function index(){
        return view('admin.khachhang.index');
    }

    public function datalistkhachhang(){
        $khachhang = Customer::all();
        $datatables = DataTables::of($khachhang)
            ->addColumn('action', function ($khachhang) {

                return view('admin.modal.btn-action-modal',
                    [
                        'edit' => '#edit_khachhang',
                        'delete_' => '#delete_khachhang',
                        'id' => $khachhang->id,
                        'urlEdit' => route('admin.khachhang.update',['id' => $khachhang->id]),
                        'detail' => route('admin.khachhang.show',['id' => $khachhang->id]),
                        'delete' => route('admin.khachhang.delete', ['id' => $khachhang->id])
                    ]);
            })
            ->editColumn('gioitinh',function (Customer $khachhang){
                return $khachhang->gioitinh == 0 ?'Nam':'Nữ';
            })
            ->editColumn('created_at', function (Customer $khachhang) {
                return $khachhang->created_at ? with(new Carbon($khachhang->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function (Customer $khachhang) {
                return $khachhang->updated_at ? with(new Carbon($khachhang->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('image_show',function (Customer $khachhang){
                return view('admin.modal.image',[
                    'image' => $khachhang->image

                ]);
            })
            ->rawColumns(['action','tinhtrang','image_show']);

        return $datatables->make(true);

    }


    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'dienthoai' => 'required|numeric',
            'cmnd' => 'required|numeric',
            'gioitinh' => 'required',
            'diachi' => 'required',

        ], [
            'name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'gioitinh.required' => 'Vui Lòng Chọn Giới tính',
            'diachi.required' => 'Vui Lòng Nhập Địa Chỉ',
            'dienthoai.required' => 'Vui Lòng Nhập Điện Thoại',
            'cmnd.required' => 'Vui Lòng Nhập CMND',
            'dienthoai.numeric' => 'Điện Thoại Phải Là Số',
            'cmnd.numeric' => 'CMND Phải Là Số',


        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{
            $khachhang = Customer::create([
                'tenkhachhang' => $request->input('name'),
                'diachi' => $request->input('diachi'),
                'dienthoai' => $request->input('dienthoai'),
                'cmnd' => $request->input('cmnd'),
                'gioitinh' => $request->input('gioitinh'),
                'email' => $request->input('donviemail'),
                'user_id' => auth()->id()

            ]);
            return Response::json(['success' => '1']);
        }
    }
    public function show($id){
        $Customer = Customer::find($id);
        return response()->json([
            'id' => $Customer->id,
            'tenkhachhang' => $Customer->tenkhachhang,
            'diachi' => $Customer->diachi,
            'cmnd' => $Customer->cmnd,
            'gioitinh' => $Customer->gioitinh,
            'dienthoai' => $Customer->dienthoai,
            'email' => $Customer->email
        ]);
    }


    public function update(Request $request,$id){
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_dienthoai' => 'required|numeric',
            'edit_cmnd' => 'required|numeric',
            'edit_gioitinh' => 'required',
            'edit_diachi' => 'required',

        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'edit_gioitinh.required' => 'Vui Lòng Chọn Giới tính',
            'edit_diachi.required' => 'Vui Lòng Nhập Địa Chỉ',
            'edit_dienthoai.required' => 'Vui Lòng Nhập Điện Thoại',
            'edit_cmnd.required' => 'Vui Lòng Nhập CMND',
            'edit_dienthoai.numeric' => 'Điện Thoại Phải Là Số',
            'edit_cmnd.numeric' => 'CMND Phải Là Số',


        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{
            $khachhang = Customer::find($id);
            if($khachhang !== null) {
                $khachhang->tenkhachhang = $request->input('edit_name');
                $khachhang->dienthoai = $request->input('edit_dienthoai');
                $khachhang->cmnd = $request->input('edit_cmnd');
                $khachhang->gioitinh = $request->input('edit_gioitinh');
                if($request->has('edit_email')){
                    $khachhang->email = $request->input('edit_email');
                }
                $khachhang->diachi = $request->input('edit_diachi');
                $khachhang->user_id = auth()->id();
                $khachhang->save();

                return Response::json(['success' => '1']);
            }
        }
    }



    public function delete(Request $request){

        if($request->ajax()){
            $khachhang = Customer::find($request->input('id'));
            if ($khachhang !== null) {
                $khachhang->delete();
                return Response::json(['success' => '1']);
            }


        }
        return Response::json(['errors' => '0']);
    }

}
