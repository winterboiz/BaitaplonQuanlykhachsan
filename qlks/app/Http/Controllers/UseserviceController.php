<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Room;
use App\Service;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;
use Yajra\Datatables\Datatables;
use App\Useservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use Illuminate\Database\Capsule\Manager;
use App\Checkin;


class UseserviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.sudungdichvu.index');
    }


    public function datalistsddichvu(){

        $thuephong = Checkin::with('phong','customer')->where('trangthai',0);
        $datatables = DataTables::of($thuephong)
            ->addColumn('action', function ($thuephong) {

                return view('admin.modal.btn-edit-modal',
                    [
                        'id' => $thuephong->id,
                        'urlEdit' => route('admin.sddichvu.add',['id' => $thuephong->id]),
//                        'detail' => route('admin.sddichvu.show',['id' => $thuephong->id]),
                    ]);

            })
            ->editColumn('ngaytra',function (Checkin $thuephong){
                return $thuephong->ngaytra ? with(new Carbon($thuephong->ngaytra))->format('H:i:s d/m/Y') : '';
            })
            ->editColumn('ngaydat',function (Checkin $thuephong){
                return $thuephong->ngaydat ? with(new Carbon($thuephong->ngaydat))->format('H:i:s d/m/Y') : '';
            })
            ->rawColumns(['ngaydat','ngaytra','created_at','action','tinhtrang']);

        return $datatables->make(true);

    }
    public function add($id){

        $data['dichvu']=Service::all();
//        $data['thuephong'] = DB::table('thuephong')
//            ->join('phong', 'phong.id', '=', 'thuephong.phong_id')
//            ->select('thuephong.id','tenphong')
//            ->where('thuephong.id','=',$id)
//            ->get();
        $data['thuephong'] = Checkin::with(['phong:id,tenphong'])->where('id',$id)->first();
        $data['sddichvu'] = DB::table('sudungdichvu')
            ->join('dichvu', 'dichvu.id', '=', 'sudungdichvu.dichvu_id')
            ->join('thuephong', 'thuephong.id', '=', 'sudungdichvu.thuephong_id')
            ->select('sudungdichvu.id as id','tendichvu','gia','dichvu_id','quantity')
            ->where('thuephong_id','=',$id)
            ->get();
        return view('admin.sudungdichvu.add', $data);

    }
//    public function show($id){
//        $Useservice = Useservice::with('phong','customer')->find($id);
//        return response()->json([
//            'id' => $Useservice->id,
//            'tenkhachhang' => $Useservice->customer->tenkhachhang,
//            'khachhang_id' => $Useservice->khachhang_id,
//            'phong_id' => $Useservice->phong_id,
//            'tenphong' => $Useservice->phong->tenphong,
//            'ngaydat' => $Useservice->ngaydat,
//            'ngaytra' => $Useservice->ngaytra
//        ]);
//
//    }
    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'so_luong' => 'required'

        ], [
            'so_luong.required' => 'Bạn Chưa nhập số lượng',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $soluong = $request->input('so_luong');
            $lishsu = DB::table('sudungdichvu')
                ->select('id','thuephong_id','dichvu_id')
                ->where('thuephong_id','=',$request->input('thuephong_id'))
                ->where('dichvu_id','=',$request->input('dichvu_id'))
                ->get();

            if(count($lishsu) > 0){
                $id = null;
                foreach ($lishsu as $ls){
                    $id = $ls->id;
                }
                $sd = Useservice::find($id);
                $sd->quantity =  $sd->quantity + $soluong;
                $sd->save();

            }else{
                $sddichvu = Useservice::create([
                    'thuephong_id' => $request->input('thuephong_id'),
                    'dichvu_id' => $request->input('dichvu_id'),
                    'quantity' => $soluong,
                    'user_id' => auth()->id()
                ]);
            }


            return redirect()->route('admin.sddichvu.add',['id' => $request->input('thuephong_id')])->with('message', "Thêm dịch vụ thành công");
        }
    }
    public function update(Request $request,$id){
        $valid = Validator::make($request->all(), [
            'edit_so_luong' => 'required',

        ], [
            'edit_so_luong.required' => 'Vui lòng nhập Tên Dịch Vụ',

        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{

            $sl = $request->input('edit_so_luong');
            $iddv = $request->input('edit_sddichvu_id');
            $sd = Useservice::find($iddv);
            $sd->quantity = $sl;
            $sd->save();

            return redirect()->route('admin.sddichvu.add',['id' => $id])->with('message', "Sửa dịch vụ thành công");
        }
    }

    public function delete($id){

        $sd = Useservice::findOrFail($id);
        if ($sd !== null) {
            $sd->delete();
            return Response::json(['success' => '1']);
        }

        return Response::json(['errors']);
    }


}
