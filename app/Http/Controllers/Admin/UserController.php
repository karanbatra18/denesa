<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteModule;
use App\SitePermission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function permissions(Request $request){
        $user = null;
        $siteModules = SiteModule::get();
        $users = User::where('role_id',2)->get();

        if(isset($request->user) && !empty($request->user)) {
            $user = User::where('id',$request->user)->first();
        }
        //dd($user);
        return view('admin.user.permissions', compact('siteModules','users', 'user'));
    }

    public function index(){
        $users = User::where('role_id',2)->get();
        return view('admin.user.index',compact('users'));
    }

    public function savePermissions(Request $request, $id){
        if(isset($request->permission) && count($request->permission)) {

            foreach($request->permission as $key => $onePermission) {
                //dd($onePermission);
                SitePermission::updateOrCreate([
                    'user_id' => $id,
                    'site_module_id' => $key,
                ],$onePermission);
            }
        }

        //$users = User::where('role_id',2)->get();
        return redirect()->back();
    }

    public function edit($id){
        $user = User::findOrfail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function trash(){
        return view('admin.user.trash');
    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('admin.user.index');
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id ],
        ]);

        $data = $request->all();

        $user = User::where(['id' => $id])->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
        return redirect()->route('admin.user.index');
    }
}
