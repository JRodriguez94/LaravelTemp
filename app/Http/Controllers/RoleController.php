<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if($request->type == 'select') {
                $roles = Role::select('display_name as text','id')->where('display_name','LIKE',"%{$request->term}%")->get();
                return response()->json(['items' => $roles]);
            } else if($request->type == 'rol') {
                $role = Role::select('id','display_name as nombre')->where('id',$request->id)->get()->toArray();
                return response()->json(['data' => $role[0]]);
            }
	    }

        if ($request->ajax() || $request->expectsJson()) {
            return $this->toDatatable();
        }

        return view('roles.index',['permisos' => Permission::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Validacion de permisos
        if (! auth()->user()) {
            return abort(403);
        }

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        $this->validate($request, $this->rules());

        Role::create([
            'name' => $request['name'],
            'display_name' => $request['display_name'],
            'description' => $request['description'],
        ]);

        $msg = [
            'title' => 'Creado!',
            'type' => 'success',
            'text' => 'Rol creado correctamente.'
        ];

        return redirect('roles')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // Validacion de permisos
        if (! auth()->user()) {
            return abort(403);
        }

        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Validacion de permisos
        if (! auth()->user()) {
            return abort(403);
        }

        return view('roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->flash();

        $this->validate($request, $this->rules($role->id));

        $role->fill($request->all());
        $role->save();

        $msg = [
            'title' => 'Editado!',
            'type' => 'success',
            'text' => 'Rol editado correctamente.'
        ];

        return redirect()->route('roles.index')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $concept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role) {

            $status = $role->status ? 0 : 1;

            if($status) {
                $msg = [
                    'title' => 'Activado!',
                    'type' => 'success',
                    'text' => 'Rol Activado correctamente.'
                ];
            } else {
                $msg = [
                    'title' => 'Desactivado!',
                    'type' => 'warning',
                    'text' => 'Rol Desactivado correctamente.'
                ];
            }

            $role->status = $status;
            $role->save();

            return response()->json($msg);

        }
        return abort(404);
    }

    /*
     * Creates datatable
     */
    public function toDatatable()
    {
        $roles = Role::get();
        return Datatables::of($roles)
            ->addColumn('action', function ($role) {
                return view('roles.partials.buttons', ['role' => $role]);
            })
            ->editColumn('status', function($role) {
                return ($role->status == 1) ? "Activo" : "Inactivo";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function rules($id = null)
    {
        return [
            'name'          => 'required|max:100|unique:roles,name'. ($id ? ",$id" : ''),
            'display_name'  => 'required|max:100',
            'description'   => 'nullable|max:255',
        ];
    }
}
