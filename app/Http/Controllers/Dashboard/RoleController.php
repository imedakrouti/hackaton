<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateRoleRequest;
use Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), 403); 
       /*  $search=request()->search;
        //dd($search);
        $roles=Role::when(request()->search,function($q) use ($search){
            return $q->where('name','like',"%$search%");
        })->paginate(2);  */
        $roles=role::whereNotIn('name',['super_admin'])->get();
        //dd($roles);
        return view('dashboard.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=permission::all();
        return view('dashboard.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255|unique:roles,name,',
            'permissions'=>'required|array|min:1',
            'description'=>'required|string',
        ]);
        $role=Role::create([
            'name'=>$request->name,
            'description'=>$request->description]);
        /* foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission);
        } */
        $role->syncPermissions($request->permissions);
        session()->flash('add', 'Insertion avec succés');
        return redirect()->route('dashboard.role.index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //dd($role);
        //$roles=role::whereNotIn('name',['super_admin'])->get();
        $permissions=permission::all();
       // $permission_role=array($permission->roles->pluck('id'));
        //dd($permission_role);
       // return view('dashboard.permissions.edit',compact('permission'));
        return view('dashboard.roles.edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
      //dd($request->all());
        $role->update([
            'name'=>$request->name,
            'description'=>$request->description]);
            
       /*  foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission);
        } */
        $role->syncPermissions($request->permissions);
        session()->flash('edit', 'Mise a jours avec succés ');
        return redirect()->route('dashboard.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       /*  abort_if(Gate::denies('role_access'), 403); */
        $role=role::find($request->id); 
        $role->delete();
       // session()->flash('success', 'data deleted successfly');
         // return redirect()->back();
         return response()->json([
            'msg'=>"success"
        ]);
    }
}
