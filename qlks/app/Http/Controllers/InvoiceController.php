<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Room;
use Yajra\Datatables\Datatables;
use App\Checkin;
use App\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $data['phongs']= Room::select('id','tenphong')->where('tinhtrang','=','0')->get();
//        $data['phong2s']= Room::select('id','tenphong')->whereIn('tinhtrang',[0,2])->get();
        return view('admin.hoadon.index');
    }


    public function datalisthoadon(){
//        $sql = 'SELECT thuephong.id,tenkhachhang,tenphong,ngaydat,ngaytra,thuephong.created_at FROM khachhang,phong,thuephong,chitietthuephong WHERE khachhang.id = thuephong.khachhang_id and thuephong.id=chitietthuephong.thuephong_id and chitietthuephong.phong_id=phong.id';
//        $thuephong = DB::SELECT($sql);
            $hoadon = Bill::with(['phieuthue'=> function($query){
                $query->with('phong');
            },'customer' ])->get();
        $datatables = DataTables::of($hoadon)
            ->addColumn('action', function ($hoadon) {

                return view('admin.modal.btn-action-4-modal',
                [
                    'id' => $hoadon->id,
                    'show' => route('admin.hoadon.show',['id' => $hoadon->id]),
                ]);

            })
            ->editColumn('tongtien',function (Bill $hoadon){
                return get_currency_vn($hoadon->tongtien);
            })
            ->editColumn('created_at',function (Bill $hoadon){
                return $hoadon->created_at ? with(new Carbon($hoadon->created_at))->format('H:i:s d/m/Y') : '';
            })
            ->rawColumns(['action','tinhtrang']);

        return $datatables->make(true);

    }

    public function show($id){
        $data['hoadon'] = Bill::with('phieuthue.phong','customer')->find($id);
        $data['mytime'] = $data['hoadon']->created_at;
//        $data['checkin'] = Checkin::find($id);
//        dd($data['checkin']);
        return view('admin.hoadon.show',$data);
    }

}
