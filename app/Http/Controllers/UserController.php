<?php

namespace App\Http\Controllers;

use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $header =[
            'title'      => 'Access Control',
            'pageTitle'  => 'User',
            'createUrl'  => 'users/create',
            'modalSize'  => 'modal-md',
            'modalTitle' => 'Add New User',
        ];
        $users = User::all();
        return view('backend.layouts.accessControl.users.index', compact('users','header'));
    }


    public function create()
    {
        $groups = UserGroup::all();
        return view('backend.layouts.accessControl.users.create', compact('groups'));
    }


    public function store(Request $request)
    {

        $user = new User();
        $user->name          = $request->input('name');
        $user->email         = $request->input('email');
        $user->password      = Hash::make($request->input('password'));
        $user->user_group_id = $request->input('user_group_id');
        $user->active_fg     = $request->input('active_fg');
        $user->created_by    = auth()->user()->id;
        if($user->save()){
            return redirect('users')->with('success', 'User added successfully.');
        }else{
            return redirect('users')->with('error', 'A problem occur. Please try again.');
        }
    }



    public function edit($id)
    {
        $user   = User::find($id);
        $groups = UserGroup::all();
        return view('backend.layouts.accessControl.users.edit', compact('user','groups'));
    }


    public function update(Request $request, $id)
    {

        $user   = User::find($id);
        $user->name          = $request->input('name');
        $user->email         = $request->input('email');
        $user->password      = Hash::make($request->input('password'));
        $user->user_group_id = $request->input('user_group_id');
        $user->active_fg     = $request->input('active_fg');
        $user->created_by    = auth()->user()->id;

        if($user->save()){
            return redirect('users')->with('success', 'User updated successfully.');
        }else{
            return redirect('users')->with('error', 'A problem occur. Please try again.');
        }
    }




    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()){
            return redirect('users')->with('success','User deleted successfully');
        }else{
            return redirect('users')->with('error', 'A problem occur. Please try again.');
        }
    }
}
