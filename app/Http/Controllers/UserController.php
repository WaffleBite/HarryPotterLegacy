<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.user.users')->with([
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        if(Gate::denies('manage-users')){
            return redirect()->route('users.index');
        }

        $user = User::findOrFail($id);
        $role = Role::all();

        return view('admin.user.edit', [
            'user' => $user,
            'role' => $role
        ]);
    }

    public function editMyDetails()
    {
        $user = Auth::user();

        return view('user.edit-account', [
            'user' => $user
        ]);
    }

    public function updateMyDetails(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $user = Auth::user();
        $role = Role::where('name', 'user')->first();

        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user->assignRole($role);

        $user -> save();

        return redirect()->route('user.account');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);

        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> roles()->sync($request->roles);

        $user -> save();

        return redirect('/dashboard/users') -> with('mssg', 'User updated!');
    }

    public function destroy($id)
    {
        if(Gate::denies('manage-users')){
            return redirect()->route('users.index');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/users') -> with('mssg', 'User deleted!');
    }
}
