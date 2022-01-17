<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.list-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.add-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
//        dd($request->all());
        $data_user = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ];
        if ($user = User::create($data_user)){
            if (is_array($request->role)) {
                foreach ($request->role as $role_id) {
                    UserRole::create(['user_id' => $user->id, 'role_id' => $role_id]);
                }
            }
            return redirect()->route('admin.user.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'aa';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role_assignments = $user->getRoles->pluck('name', 'id')->toArray();
//        dd($role_assignments);

        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.edit-user', compact('user', 'roles', 'role_assignments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
//        dd($request->all());
        $data_user = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ];
        $user->update($data_user);
        if (is_array($request->role)) {
            UserRole::where('user_id', $user->id)->delete();
            foreach ($request->role as $role_id) {
                UserRole::create(['user_id' => $user->id, 'role_id' => $role_id]);
            }

        }
        return redirect()->route('admin.user.index')->with('success', "Sửa thành công user $user->last_name");
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

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
