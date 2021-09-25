<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionUpdateRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Gate;
use Illuminate\Http\JsonResponse;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::with('roles')->get();
        
      /*   $permission=permission::find(25);
        foreach($permission->roles as $role){
            dd($role->name);
        }
         */
        //$role=role::findByName('super_admin');
        //dd($role->permissions);
       // dd($permissions->count());
        return view('dashboard.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=role::whereNotIn('name',['super_admin'])->get();
        return view('dashboard.permissions.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name,',
           /*  'roles'=>'array|min:1', */
            'description'=>'required|string',
        ]);
        $permission=Permission::create([
            'name'=>$request->name,
            'description'=>$request->description]);
            $role=role::findByName('super_admin');
            $role->givePermissionTo($permission->name);
        if($request->roles){
            foreach ($request->roles as $role) {
                role::findById($role)->givePermissionTo($permission->name);
            }
        }
        
        session()->flash('add', 'Insertion avec succés');
        return redirect()->route('dashboard.permission.index');
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
    public function edit($id)
    {
        $roles=role::whereNotIn('name',['super_admin'])->get();
        $permission=permission::find($id);
       // $permission_role=array($permission->roles->pluck('id'));
        //dd($permission_role);
       // return view('dashboard.permissions.edit',compact('permission'));
        return view('dashboard.permissions.edit')->with(['permission'=>$permission,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
     /*    $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name,'.$permission->id,
            'roles'=>'required|min:1',
        ]); */
       // dd($request->all());
        $permission->update(['name'=>$request->name,
                            'description'=>$request->description]);
                        if($request->roles){
                            foreach ($request->roles as $role) {
                                role::findById($role)->givePermissionTo($permission->name);
                            }
                        }
        session()->flash('edit', 'Mise a jours avec succés ');
        return redirect()->route('dashboard.permission.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
      //  dd($permission);
      $permission=permission::find($request->id);
      $permission->delete();

       // return redirect()->back();
       return response()->json([
           'msg'=>"success"
       ]);

    }
}
