<?php

namespace Cinebaz\Permissions\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Permissions\Http\Requests\TagFV;
use Cinebaz\Permissions\Models\Permissions;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionsController extends Controller
{
    use TSeo;

    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function role()
    {
        $getRoles   = Role::get();
        return view('permissions::role',compact('getRoles'));
    }
    public function SaveRole(Request $request){
        
        try {
            $role = Role::create(['name' => $request->title]);
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
        return redirect()->back();
    }

    public function permission()
    {
        $getPermission      = Permission::get();
        return view('permissions::permission',compact('getPermission'));
    }
    public function SavePermission(Request $request){
        
        try {
            $permission = Permission::create(['name' => $request->title]);
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
        return redirect()->back();
    }
    public function assign()
    {
        $getUser            = User::get();
        $getRole            = Role::get();
        $getPermission      = Permission::get();
        return view('permissions::assign',compact('getUser','getPermission','getRole'));
    }
    public function SaveAssignRole(Request $request){
        $user      = User::where('id',$request->user)->first();
        $role      = Role::where('id',$request->role)->first();
        try {
            $user->assignRole($role->name);
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
        return redirect()->back();
    }
    public function SaveAssignPermission(Request $request){
        $user            = User::where('id',$request->user)->first();
        $permission      = Permission::where('id',$request->permission)->first();
        try {
            $user->givePermissionTo($permission->name);
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
        return redirect()->back();
    }
    public function AssignRoleDelete(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $user->removeRole($request->role);
        return redirect()->back();
    }
    public function AssignPermissionDelete(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $user->revokePermissionTo($request->permission);
        return redirect()->back();
    }
}
