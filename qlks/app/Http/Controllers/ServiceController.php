<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dichvu-list',['only' => ['index']]);
        $this->middleware('permission:dichvu-update', ['only' => ['update','store']]);
        $this->middleware('permission:dichvu-delete', ['only' => ['delete']]);
    }

    public function index(){
        return view('admin.dichvu.index');
    }

    public function datalistdichvu(){
        $dichvu = Service::all();
        $datatables = DataTables::of($dichvu)
            ->addColumn('action', function ($dichvu) {

                return view('admin.modal.btn-action-modal',
                    [
                        'edit' => '#edit_dichvu',
                        'delete_' => '#delete_dichvu',
                        'id' => $dichvu->id,
                        'urlEdit' => route('admin.dichvu.update',['id' => $dichvu->id]),
                        'detail' => route('admin.dichvu.show',['id' => $dichvu->id]),
                        'delete' => route('admin.dichvu.delete', ['id' => $dichvu->id])
                    ]);
            })
            ->editColumn('created_at', function (Service $dichvu) {
                return $dichvu->created_at ? with(new Carbon($dichvu->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function (Service $dichvu) {
                return $dichvu->updated_at ? with(new Carbon($dichvu->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('image_show',function (Service $dichvu){
                return view('admin.modal.image',[
                    'image' => $dichvu->image

                ]);
            })
            ->rawColumns(['action','tinhtrang','image_show']);

        return $datatables->make(true);

    }


    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:phong,tenphong',
            'image' => 'image|max:2048',
            'soluong' => 'required',
            'gia' => 'required',
            'donvi' => 'required',

        ], [
            'name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'soluong.required' => 'Vui Lòng Nhập Số Lượng',
            'image.max' => 'Kích cỡ ảnh quá lớn',
            'donvi.required' => 'Vui Lòng Nhập Đơn Vị',
            'gia.required' => 'Vui Lòng Nhập Giá',
        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{

//            //Thêm hình ảnh
            $imageName= '';

            if($request->hasFile('image')){
                $image = $request->file('image');

                if (file_exists(public_path('uploads'))) {
                    $folder_name = date('Y-m-d');
                    $fileName = md5($image->getClientOriginalName() . time()).'.'. $image->getClientOriginalExtension();

                    if (!file_exists(public_path('uploads/' . $folder_name))) {
                        mkdir(public_path('uploads/' . $folder_name), 0755);
                    }

                    $imageName = "$folder_name/$fileName" ;
                    $image->move(public_path('uploads/' . $folder_name), $fileName);

                }
            }

            $dichvu = Service::create([
                'tendichvu' => $request->input('name'),
                'gia' => $request->input('gia'),
                'soluong' => $request->input('soluong'),
                'donvi' => $request->input('donvi'),
                'image' => $imageName,
                'user_id' => auth()->id()

            ]);
            return Response::json(['success' => '1']);
        }
    }
    public function show($id){
        $service = Service::find($id);
        return response()->json([
            'id' => $service->id,
            'tendichvu' => $service->tendichvu,
            'gia' => $service->gia,
            'image' => asset('uploads/'.$service->image.''),
            'donvi' => $service->donvi,
            'soluong' => $service->soluong
        ]);
    }


    public function update(Request $request,$id){
        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_image' => 'image|max:2048',
            'edit_donvi' => 'required',
            'edit_soluong' => 'required',
            'edit_gia' => 'required',


        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Dịch Vụ',
            'edit_donvi.required' => 'Vui lòng nhập đơn vị',
            'edit_name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'edit_gia.required' => 'Vui Lòng Nhập Giá',
            'edit_soluong.required' => 'Vui lòng nhập Số lượng',
            'edit_image.max' => 'Kích cỡ ảnh quá lớn',

        ]);

        if($valid->fails()){
            return Response::json(['errors' => $valid->errors()]);
        }else{
            $dichvu = Service::find($id);
            if($dichvu !== null) {
//            //Thêm hình ảnh
                $imageName = $dichvu->image;

                if ($request->hasFile('edit_image')) {
                    if (!is_dir(public_path('uploads/' . $dichvu->image)) && file_exists(public_path('uploads/' . $dichvu->image))) {
                        unlink(public_path('uploads/' . $dichvu->image));
                    }

                    $image = $request->file('edit_image');
                    if (file_exists(public_path('uploads'))) {
                        $folder_name = date('Y-m-d');
                        $fileName = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();

                        if (!file_exists(public_path('uploads/' . $folder_name))) {
                            mkdir(public_path('uploads/' . $folder_name), 0755);
                        }
                        $imageName = "$folder_name/$fileName";
                        $image->move(public_path('uploads/' . $folder_name), $fileName);

                    }
                }

                $dichvu->tendichvu = $request->input('edit_name');
                $dichvu->donvi = $request->input('edit_donvi');
                $dichvu->soluong = $request->input('edit_soluong');
                $dichvu->gia = $request->input('edit_gia');
                $dichvu->image = $imageName;
                $dichvu->user_id = auth()->id();
                $dichvu->save();

                return Response::json(['success' => '1']);
            }
        }
    }



    public function delete($id){
        $dichvu = Service::findOrFail($id);
        if ($dichvu !== null) {
            $dichvu->delete();
            return Response::json(['success' => '1']);
        }

        return Response::json(['errors']);
    }

}
