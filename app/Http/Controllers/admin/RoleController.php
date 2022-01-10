<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleAddRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.list-role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];
        $allRoute = Route::getRoutes();
        foreach ($allRoute as $route) {
            $name = $route->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $name);
            }
        }
//        dd($routes);
        return view('admin.add-role', compact('routes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleAddRequest $request)
    {
//        dd($request->all());
//        array_push($request->route,'admin.dashboard');
        $routes = json_encode($request->route);
        $role = Role::create(['name' => $request->name, 'permissions' => $routes]);
//        dd($request->all());
        if ($role) {
            return redirect()->route('role.index')->with('success', 'Thêm mới nhóm quyền thành công');
        } else {
            return redirect()->route('role.create')->with('error', 'Thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = json_decode($role->permissions);
//        dd($permission);
        $routes = [];
        $allRoute = Route::getRoutes();
        foreach ($allRoute as $route) {
            $name = $route->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes)) {
                array_push($routes, $name);
            }
        }
//        dd($routes);
        return view('admin.edit-role', compact('routes', 'role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
//        dd($request->route);

//        array_push($request->route, 'admin.dasaboeard');


        $routes = json_encode($request->route);
//        dd($routes);
        $role->update(['name' => $request->name, 'permissions' => $routes]);
        return redirect()->route('admin.role.index')->with('success', 'Sửa nhóm quyền thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
