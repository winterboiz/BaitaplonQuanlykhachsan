<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;

class PermessionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
//
    }



    public function index()
    {

        return view('admin.permession.index');
    }


    public function datalistpermession(){

        $permession = Permission::all();
        $datatables = DataTables::of($permession)->addColumn('action', function ($permession) {

            return view('admin.modal.btn-action3-modal',
                [
                    'edit' => '#edit_permession',
                    'delete_' => '#delete_permession',
                    'id' => $permession->id,
                    'urlEdit' => route('admin.permession.update', ['id' => $permession->id]),
                    'detail' => route('admin.permession.show', ['id' => $permession->id]),
                    'delete' => route('admin.permession.delete',['id' => $permession->id])
                ]);
        })->rawColumns([ 'rownum', 'action']);

        return $datatables->make(true);


    }
    public function create()
    {

        return view('admin.permession.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);


        $role = Permission::create(['name' => $request->input('name')]);


        return redirect()->route('admin.permession.index')
            ->with('success','Role created successfully');
    }
}
