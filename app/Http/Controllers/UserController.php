<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Mail\NuevoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax() || $request->expectsJson()) {
            return $this->toDatatable();
        }
        return view('users.index');
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

        $roles = Role::all()->pluck('display_name','id');
        $roles->prepend('Selecciona una opción',0);
      	return view('users.create', array('roles' => $roles));
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

        $user = new User;
        $user->fill($request->all());
        $user->password =  str_random(8);

        Mail::to($request->email)
        ->send(new NuevoUsuario($user));

        $user->password =  Hash::make($user->password);
        $user->save();

        $user->attachRole(Role::find($request->rol));

        $msg = [
            'title' => 'Creado!',
            'type' => 'success',
            'text' => 'Usuario creado correctamente.'
        ];

        return redirect('users')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Validacion de permisos
        if (! auth()->user()) {
            return abort(403);
        }

        if ($user) {
            return response()->json(User::where('id',$user->id)->with('roles')->first());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Validacion de permisos
        if (! auth()->user()) {
            return abort(403);
        }

        $roles = Role::all()->pluck('display_name','id');
        $roles->prepend('Selecciona una opción',0);

        return view('users.edit', ['user' => $user->load('roles'),'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->flash();

        $this->validate($request, $this->rules($user->id));

        $user->fill($request->all());
        $user->save();

        $user->detachRoles($user->roles);
        $user->attachRole(Role::find($request->rol));

        $msg = [
            'title' => 'Editado!',
            'type' => 'success',
            'text' => 'Usuario editado correctamente.'
        ];

        return redirect()->route('users.index')->with('message', $msg);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
     public function destroy(User $user)
     {
         if ($user) {

             $status = $user->status ? 0 : 1;

             if($status) {
                 $msg = [
                     'title' => 'Activado!',
                     'type' => 'success',
                     'text' => 'Usuario Activado correctamente.'
                 ];
             } else {
                 $msg = [
                     'title' => 'Desactivado!',
                     'type' => 'warning',
                     'text' => 'Usuario Desactivado correctamente.'
                 ];
             }

             $user->status = $status;
             $user->save();

             return response()->json($msg);

         }
         return abort(404);
     }

    /*
     * Creates datatable
     */
    public function toDatatable()
    {
        $users = User::get();
        return Datatables::of($users)
            ->addColumn('actions', function ($user) {
                return view('users.partials.buttons', ['user' => $user]);
            })
            ->editColumn('status', function($user) {
                return ($user->status == 1) ? "Activo" : "Inactivo";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    private function rules($id = null)
    {
        return [
            'username'      => 'required',
            'last_name'  => 'required',
            'second_last_name'   => 'required',
            'street' => 'required',
            'outside_number' => 'required|numeric',
            'neighborhood' => 'required',
            'postal_code' => 'required|numeric',
            'city' => 'required',
            'state' => 'required',
            'cellphone' => 'required|numeric',
            'base_salary' => 'required|numeric',
            'email' => 'required|email|max:60|unique:users,email'. ($id ? ",$id" : ''),
        ];
    }
}
