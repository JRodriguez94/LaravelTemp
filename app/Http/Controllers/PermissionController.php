<?php

namespace App\Http\Controllers;

use App\Role;
use App\RolesPermission;
use App\Permission;
use Illuminate\Support\Facades\Input;

class PermissionController extends Controller
{
    protected $permission;

    public function  __construct() {
        $permission = Permission::all();
        $this->permission = $permission;
    }

    public function index()
    {
        return response()->json($this->getPermissions(Input::get('id')));
    }

    private function getPermissions($id_rol){
        $permission = array();

        $permission['assignedPermissions'] = $this->getAssignedPermissions($id_rol);
        return $permission;

    }

    private function getAssignedPermissions($id_rol){
        $rolePermissions = RolesPermission::where('role_id', '=', $id_rol)->get();
        $assigned = array();
        foreach($rolePermissions as $p){

            foreach ($this->permission as $key => $value){
                if($value->id == $p->permission_id){
                    $assigned[] = $value;
                }
            }
        }

        return $assigned;
    }

    public function assign(){
        $role = Role::find(Input::get('role_id'));
        $role->attachPermission(Input::get('permission_id'));
        return response()->json('ok');
    }

    public function unassign(){
        RolesPermission::where('role_id', '=', Input::get('role_id'))
            ->where('permission_id', '=', Input::get('permission_id'))->delete();

        return response()->json('ok');
    }
}
