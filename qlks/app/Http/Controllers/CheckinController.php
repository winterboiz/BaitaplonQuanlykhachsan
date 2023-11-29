<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Room;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Checkin;
use App\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;



class CheckinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['phongs']= Room::select('id','tenphong')->where('tinhtrang','=','0')->get();
//        $data['phong2s']= Room::select('id','tenphong')->whereIn('tinhtrang',[0,2])->get();
        return view('admin.thuephong.index',$data);
    }


    public function datalistroder(){
//        $sql = 'SELECT thuephong.id,tenkhachhang,tenphong,ngaydat,ngaytra,thuephong.created_at FROM khachhang,phong,thuephong,chitietthuephong WHERE khachhang.id = thuephong.khachhang_id and thuephong.id=chitietthuephong.thuephong_id and chitietthuephong.phong_id=phong.id';
//        $thuephong = DB::SELECT($sql);
        $thuephong = Checkin::with('phong','customer')->where('trangthai',0);
        $datatables = DataTables::of($thuephong)
            ->addColumn('action', function ($thuephong) {

                    return view('admin.modal.btn-action2-modal',
                        [
                            'edit' => '#edit_thuephong',
                            'delete_' => '#delete_thuephong',
                            'id' => $thuephong->id,
                            'urlEdit' => route('admin.thuephong.update',['id' => $thuephong->id]),
                            'detail' => route('admin.thuephong.show',['id' => $thuephong->id]),
                            'delete' => url('admin/thuephong/thanhtoan',['id' => $thuephong->id]),
                        ]);

            })
            ->editColumn('ngaytra',function (Checkin $thuephong){
                return $thuephong->ngaytra ? with(new Carbon($thuephong->ngaytra))->format('H:i:s d/m/Y') : '';
            })
            ->editColumn('ngaydat',function (Checkin $thuephong){
                return $thuephong->ngaydat ? with(new Carbon($thuephong->ngaydat))->format('H:i:s d/m/Y') : '';
            })
//            ->addColumn('tenphong',function (Checkin $thuephong){
//                $tenphong='';
//                foreach ($thuephong->rooms as $room){
//                    $tenphong= $room->tenphong;
//                }
//                return $tenphong;
//            })
            ->rawColumns(['ngaydat','ngaytra','created_at','action','tinhtrang']);

        return $datatables->make(true);

    }


    public function show($id){
        $Checkin = Checkin::with('phong','customer')->find($id);
        return response()->json([
            'id' => $Checkin->id,
            'tenkhachhang' => $Checkin->customer->tenkhachhang,
            'khachhang_id' => $Checkin->khachhang_id,
            'phong_id' => $Checkin->phong_id,
            'tenphong' => $Checkin->phong->tenphong,
            'ngaydat' => $Checkin->ngaydat,
            'ngaytra' => $Checkin->ngaytra
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

            $thuephong = Checkin::create([
                'khachhang_id' => $khachhang->id,
                'phong_id' => $phong_id,
                'ngaydat' => $ngaydat,
                'ngaytra' => $ngaytra,
                'user_id' => auth()->id()
            ]);

            $phong = Room::find($phong_id);
            $phong->tinhtrang = 2;
            $phong->save();

            return Response::json(['success' => '1']);
        }
    }
    public function update(Request $request,$id){
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',

        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Dịch Vụ',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{
            $p_id = $request->input('p_id');
            $new_phong_id = $request->input('edit_phong_id');

            $checkin = Checkin::find($id);
            if($checkin !== null) {
                if ($request->has('edit_checkin')) {
                    $ngaydat = $request->input('edit_checkin');
                }
                if ($request->has('edit_checkout')) {
                    $ngaytra = $request->input('edit_checkout');
                }
//                $checkin->phong_id = $p_id;

                if ($request->has('edit_phong_id') && ($new_phong_id !== null)){

                    $newstt = DB::table('phong')
                            ->where('id','=', $new_phong_id)
                            ->update(['tinhtrang' => 2]);
                    $checkin->phong_id = $new_phong_id;
                    $oldsst =DB::table('phong')
                        ->where('id','=', $p_id)
                        ->update(['tinhtrang' => 0]);
                }

                $checkin->ngaydat = $ngaydat;
                $checkin->ngaytra = $ngaytra;
                $checkin->save();


            }

            return Response::json(['success' => '1']);
        }
    }
    public function checkout($id){
        $data['checkin'] = Checkin::with('phong.loaiphong','customer','sddichvu.dichvu')->where('id',$id)->get()->first();
        $data['mytime'] = Carbon::now('+7');
//        $data['checkin'] = Checkin::find($id);
//        dd($data['checkin']);
        return view('admin.thuephong.thanhtoan',$data);


    }
    public function thanhtoan(Request $request){

       if($request->all()){

           $hoadon = Bill::create([
               'khachhang_id' => $request->input('makhachhang'),
               'thuephong_id' => $request->input('mathuephong'),
               'tienphong' => $request->input('tienphong'),
               'tiendichvu' => $request->input('tiendichvu'),
               'tongtien' => $request->input('tongtien'),
               'user_id' => auth()->id()
           ]);

            $trangthaiphong = Room::find($request->maphong);
            $trangthaiphong->tinhtrang = 0;
            $trangthaiphong->save();

            $trangthaithue = Checkin::find($request->input('mathuephong'));
           $trangthaithue->trangthai = 1;
           $trangthaithue->save();

           alert()->success('Đã Thanh Toán thành công');
           return redirect()->route('admin.thuephong.index');
           

       }
        alert()->error('Có lỗi');
        return redirect()->back();


    }

}
