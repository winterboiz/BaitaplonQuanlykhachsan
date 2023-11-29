<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use DB;


class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-create', ['only' => ['create','list']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['create','list','delete']]);
    }



    public function index()
    {

        return view('admin.role.index');
    }

    public function datalistrole(){

        $role = Role::all();
        $datatables = DataTables::of($role)->addColumn('action', function ($role) {

            return view('admin.modal.btn-action3-modal',
                [
                    'edit' => '#edit_role',
                    'delete_' => '#delete_role',
                    'id' => $role->id,
                    'urlEdit' => route('admin.role.update', ['id' => $role->id]),
                    'detail' => route('admin.role.show', ['id' => $role->id]),
                    'delete' => route('admin.role.delete',['id' => $role->id])
                ]);
        })->rawColumns([ 'rownum', 'action']);

        return $datatables->make(true);


    }


    public function create()
    {
        $permission = Permission::get();
        return view('admin.role.create',compact('permission'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('admin.role.index')
            ->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('admin.role.edit',compact('role','permission','rolePermissions'));
    }


    public function showId($id){

        $user = User::find($id);
        if($user !== null){
            return response()->json([
                'id' => $user->id,
            ]);
        }

        return abort(401);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('admin.role.index')
            ->with('success','Role updated successfully');
    }


    public function delete($id)
    {
//        DB::table("roles")->where('id',$id)->delete();
//        return redirect()->route('roles.index')
//            ->with('success','Role deleted successfully');
        $role = Role::findOrFail($id);
        if ($role !== null) {
            $role->delete();
            return Response::json(['success' => '1']);

        }
    }
}