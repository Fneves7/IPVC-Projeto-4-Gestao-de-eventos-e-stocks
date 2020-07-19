<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index()
    {
        //dd('user.index');
        //return redirect(route('user.index'));
        $users = User::all();

        return view('user.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        if(Gate::denies('admin-view')){
            return redirect(route('home'));
        }

        $users = User::all();
        $roles = Role::all();
        return view('admin.createUser')->with([
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->vat = $request->vat;
        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $role = Role::find($request->role_id);
        $roleUser = User::find($request->user_id);
        $user->roles()->attach($role);
        $user->roles()->attach($roleUser);
        return redirect()->route('admin.usersManagement');
    }

    public function edit(User $user)
    {
//        if(Gate::allows('edit-users')){
//            return redirect(route('home'));
//        }

        if($user->id != Auth::user()->id){
            return redirect()->back();
        }

        return view('user.edit')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->vat = $request->vat;
        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->email = $request->email;
        $user->contact = $request->contact;
//        TODO: testar password
//        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        if(Gate::allows('admin-user')){
            return redirect(route('home'));
        }
        $user = User::findOrFail($user->id);
//        dd($user);
        $user->delete();
        return redirect()->back();
    }


//    ADMIN
    public function indexAdmin()
    {
        if(Gate::denies('admin-view')){
            return redirect(route('home'));
        }
        $users = User::where('id','>',1)->get();
        return view('admin.users')->with([
        'users' => $users
    ]);
    }

    public function editUserAdmin(User $user)
    {
        if(Gate::denies('admin-view')){
            return redirect(route('home'));
        }

        $roles = Role::all();
        return view('admin.editUser')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function updateUsers(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->vat = $request->vat;
        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->email = $request->email;
        $user->contact = $request->contact;
//        $user->password = bcrypt($request->password);
        $user->save();

        $role = Role::find($request->role_id);
        $roleUser = Role::find($request->user_id);

        $user->roles()->sync([]);
        $user->roles()->attach($role);
        $user->roles()->attach($roleUser);

//        dd($roleUser);
        return redirect()->route('admin.usersManagement');
    }
}
