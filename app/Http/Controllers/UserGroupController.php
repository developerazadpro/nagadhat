<?php

namespace App\Http\Controllers;

use App\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $header =[
            'title'      => 'Access Control',
            'pageTitle'  => 'User Groups',
            'createUrl'  => 'user-groups/create',
            'modalSize'  => 'modal-md',
            'modalTitle' => 'Add New User Group',
        ];
        $groups = UserGroup::all();
        return view('backend.layouts.accessControl.userGroups.index', compact('groups','header'));
    }


    public function create()
    {
        return view('backend.layouts.accessControl.userGroups.create');
    }


    public function store(Request $request)
    {

        $userGroup = new UserGroup();
        $userGroup->user_group_name          = $request->input('user_group_name');
        $userGroup->user_group_key         = $request->input('user_group_key');
        $userGroup->userdsl_no         = $request->input('userdsl_no');
        $userGroup->active_fg     = $request->input('active_fg');
        $userGroup->created_by    = auth()->user()->id;
        if($userGroup->save()){
            return redirect('user-groups')->with('success', 'User Group added successfully.');
        }else{
            return redirect('user-groups')->with('error', 'A problem occur. Please try again.');
        }
    }


    public function edit($id)
    {
        $group = UserGroup::find($id);
        return view('backend.layouts.accessControl.userGroups.edit', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $userGroup = UserGroup::find($id);
        $userGroup->user_group_name   = $request->input('user_group_name');
        $userGroup->user_group_key    = $request->input('user_group_key');
        $userGroup->userdsl_no        = $request->input('userdsl_no');
        $userGroup->active_fg         = $request->input('active_fg');
        $userGroup->created_by        = auth()->user()->id;
        if($userGroup->save()){
            return redirect('user-groups')->with('success', 'User Group updated successfully.');
        }else{
            return redirect('user-groups')->with('error', 'A problem occur. Please try again.');
        }
    }


    public function destroy($id)
    {
        $userGroup = UserGroup::find($id);
        if ($userGroup->delete()){
            return redirect('user-groups')->with('success','Group deleted successfully');
        }
    }
}
