<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('admin.user.index');
    }
    public function create(){
        $data['roles'] = Role::pluck('name','name')->all();
        return view('admin.user.create',$data);
    }

    public function datalistuser(){

        $user = User::all();
        $datatables = DataTables::of($user)->addColumn('action', function ($user) {

            return view('admin.modal.btn-action3-modal',
                [
                    'delete_' => '#delete_user',
                    'id' => $user->id,
                    'urlEdit' => route('admin.users.update', ['id' => $user->id]),
                    'detail' => route('admin.users.show', ['id' => $user->id]),
                ]);
             })

        ->addColumn('role', function (User $user) {

            if(!empty($user->getRoleNames())){
                foreach($user->getRoleNames() as $v){
                    return  '<label class="label label-success">'.$v.'</label>';

                }
            }
            return 'Không';

            })
        ->rawColumns([ 'rownum', 'action','role']);

        return $datatables->make(true);



    }



    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
        ], [
            'name.required' => 'Vui lòng nhập Họ Tên',
            'email.required' => 'Vui lòng nhập Email',
            'email.email' => 'Không đúng định dạng Email',
            'email.unique' => 'Email này đã trùng vui lòng chọn Email khác',
            'password.required' => 'Vui lòng nhập Mật Khẩu',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            $user->assignRole($request->input('roles'));
            return redirect()->route('admin.users.index')
                ->with('success','User created successfully');
        }
    }


    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.user.edit',compact('user','roles','userRole'));
    }
    public function update(Request $request,$id){
//
        $user = User::find($id);
            if ($user !== null) {
                $user->name = $request->input('edit_name');
                $user->email = $request->input('edit_email');
                if ($request->input('edit_password')) {
                    $user->password = bcrypt($request->input('edit_password'));
                }
                $user->save();

                DB::table('model_has_roles')->where('model_id',$id)->delete();
                $user->assignRole($request->input('roles'));
                    return redirect()->route('admin.users.index')->with('message', "Cập nhật người dùng $user->name thành công");
            }
            return redirect()->route('admin.users.index')->with('error', 'không tìm thấy người dùng');

    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user !== null) {
            $user->delete();
            return Response::json(['success' => '1']);

        }
    }
}
