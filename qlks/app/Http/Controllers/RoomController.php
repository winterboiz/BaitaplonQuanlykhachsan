<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Room;
use App\Kind_of_room;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use App\Attachment;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:phong-list',['only' => ['index']]);
        $this->middleware('permission:phong-update', ['only' => ['update','store']]);
        $this->middleware('permission:phong-delete', ['only' => ['delete']]);
    }

    public function index(){
        $data['loaiphongs'] = Kind_of_room::select('id','tenloaiphong')->orderBy('tenloaiphong', 'asc')->get();
        return view('admin.phong.index',$data);
    }


    public function datalistroom(){
        $phong = Room::with('loaiphong');
        $datatables = DataTables::of($phong)
            ->addColumn('action', function ($phong) {

                    return view('admin.modal.btn-action3-modal',
                        [
                            'edit' => '#edit_phong',
                            'delete_' => '#delete_phong',
                            'id' => $phong->id,
                            'urlEdit' => route('admin.phong.update',['id' => $phong->id]),
                            'detail' => route('admin.phong.show',['id' => $phong->id]),
                            'delete' => route('admin.phong.delete', ['id' => $phong->id])
                        ]);
            })
            ->editColumn('tinhtrang',function (Room $phong){
                if($phong->tinhtrang == 1){
                    return '<span class="label label-warning">Đang Đặt</span>';
                }elseif ($phong->tinhtrang == 2){
                    return '<span class="label label-danger">Đang Sử Dụng</span>';
                }
                return '<span class="label label-success">Trống</span>';
//                return $phong->tinhtrang == 1 ?'<span class="label label-danger">Đang Đặt</span>':'<span class="label label-success"></i>Trống</span>';
            })
            ->editColumn('created_at', function (Room $phong) {
                return $phong->created_at ? with(new Carbon($phong->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function (Room $phong) {
                return $phong->updated_at ? with(new Carbon($phong->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('image_show',function (Room $phong){
                return view('admin.modal.image',[
                    'image' => $phong->image

                ]);
            })
            ->rawColumns(['action','tinhtrang','image_show']);

        return $datatables->make(true);

    }

    public function show($id){
        $data['loaiphongs'] = Kind_of_room::select('id','tenloaiphong')->orderBy('tenloaiphong', 'asc')->get();
        $data['phong'] = Room::find($id);
        if($data['phong'] !== null){
//            return response()->json([
//                'id' => $phong->id,
//                'tenphong' => $phong->tenphong,
//                'mota' => $phong->mota,
//                'image' => asset('uploads/'.$phong->image.''),
//                'loaiphong_id' => $phong->loaiphong_id,
//                'thuvienhinhanh' => $phong->attachments,
//            ]);
            return view('admin.phong.edit',$data);
        }

        return abort(401);

    }

    public function store(Request $request){

        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:phong,tenphong',
            'image' => 'image|max:2048',
            'mota' => 'required',
            'loaiphong_id' => 'required|exists:loaiphong,id'

        ], [
            'name.required' => 'Vui lòng nhập Tên Phòng',
            'name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'mota.required' => 'Vui Lòng Nhập Mô Tả',
            'image.max' => 'Kích cỡ ảnh quá lớn',
            'loaiphong_id.required' => 'Vui Lòng Chọn Loại Phòng',
            'loaiphong_id.exists' => 'Vui lòng nhập đúng Loaiphong_id',
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

            $phong = Room::create([
                'tenphong' => $request->input('name'),
                'mota' => $request->input('mota'),
                'image' => $imageName,
                'loaiphong_id' => $request->input('loaiphong_id'),
                'user_id' => auth()->id()

            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    Attachment::create([
                        'type' => 'image',
                        'mime' => $file->getMimeType(),
                        'path' => $this->saveImage($file),
                        'phong_id' => $phong->id
                    ]);
                }
            }
            return Response::json(['success' => '1']);
        }
    }


    public function update(Request $request,$id){

        $valid = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_image' => 'image|max:2048',
            'edit_mota' => 'required',
            'edit_loaiphong_id' => 'required|exists:loaiphong,id',


        ], [
            'edit_name.required' => 'Vui lòng nhập Tên Phòng',
            'edit_name.unique' => 'Tên này đã trùng vui lòng chọn Tên khác',
            'edit_mota.required' => 'Vui Lòng Nhập Mô Tả',
            'edit_images.*.max' => 'Kích cỡ ảnh quá lớn',
            'edit_image.max' => 'Kích cỡ ảnh quá lớn',
            'edit_loaiphong_id.required' => 'Vui Lòng Chọn Loại Phòng',
            'edit_loaiphong_id.exists' => 'Vui lòng nhập đúng Loaiphong_id',
        ]);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $phong = Room::find($id);
            if($phong !== null) {
//            //Thêm hình ảnh
                $imageName = $phong->image;

                if ($request->hasFile('edit_image')) {
                    if (!is_dir(public_path('uploads/' . $phong->image)) && file_exists(public_path('uploads/' . $phong->image))) {
                        unlink(public_path('uploads/' . $phong->image));
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
                //            Cập nhật vào thư viện hình ảnh
                if ($request->hasFile('edit_images')) {
                    foreach ($phong->attachments as $file) {
                        $this->deleteImage($file->path);
                        $file->delete();
                    }
                    foreach ($request->file('edit_images') as $file) {
                        Attachment::create([
                            'type' => 'image',
                            'mime' => $file->getMimeType(),
                            'path' => $this->saveImage($file),
                            'phong_id' => $phong->id
                        ]);
                    }
                }

                $phong->tenphong = $request->input('edit_name');
                $phong->mota = $request->input('edit_mota');
                $phong->image = $imageName;
                $phong->loaiphong_id = $request->input('edit_loaiphong_id');
                $phong->user_id = auth()->id();
                $phong->save();



                    alert()->success('Cập nhật '.$phong->tenphong.' thành công');


                return redirect()->route('admin.phong.index')->with('message', "Cập nhật  thành công");

            }
        }

        alert()->error('Cập nhật không thành công!');
        return redirect()->route('admin.phong.index')->with('errors', "Cập nhật không  thành công");
    }


    public function delete($id){
        $phong = Room::findOrFail($id);
        if ($phong !== null) {
            $phong->delete();
            return Response::json(['success' => '1']);
        }
    }
    public function saveImage($image) {
        if (!empty($image) && file_exists(public_path('uploads'))) {
            $folderName = date('Y-m');
            $fileNameWithTimestamp = md5($image->getClientOriginalName() . time());
            $fileName = $fileNameWithTimestamp . '.' . $image->getClientOriginalExtension();
            if (!file_exists(public_path('uploads/' . $folderName))) {
                mkdir(public_path('uploads/' . $folderName), 0755);
            }
//                    Di chuyển file vào folder Uploads
            $imageName = "$folderName/$fileName";
            $image->move(public_path('uploads/' . $folderName), $fileName);

//            Tạo các hình ảnh theo tỉ lệ giao diện
            $createImage = function($suffix = '_thumb', $width = 250, $height = 170) use($folderName, $fileName, $fileNameWithTimestamp, $image) {
                $thumbnailFileName = $fileNameWithTimestamp . $suffix . '.' . $image->getClientOriginalExtension();
                Image::make(public_path("uploads/$folderName/$fileName"))
                    ->resize($width, $height)
                    ->save(public_path("uploads/$folderName/$thumbnailFileName"))
                    ->destroy();
            };
            $createImage();
            $createImage('_450x337', 450, 337);
            $createImage('_80x80', 80, 80);

            return $imageName;
        }
    }

    public function deleteImage($path) {
        if (!is_dir(public_path('uploads/' . $path)) && file_exists(public_path('uploads/' . $path))) {
            unlink(public_path('uploads/' . $path));
            $deleteAllImages = function($sizeArr) use($path) {
                foreach ($sizeArr as $size) {
                    if (!is_dir(public_path('uploads/' . get_thumbnail($path, $size))) && file_exists(public_path('uploads/' . get_thumbnail($path, $size)))) {
                        unlink(public_path('uploads/' . get_thumbnail($path, $size)));
                    }
                }
            };

            $deleteAllImages(['_thumb', '_450x337', '_80x80']);

        }
    }
    public function checkroom(){

    }


}
