<?php

namespace App\Http\Controllers;

use App\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.layouts.accessControl.userGroups.index', compact('groups','header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.accessControl.userGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = UserGroup::find($id);
        return view('admin.layouts.accessControl.userGroups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userGroup = UserGroup::find($id);
        if ($userGroup->delete()){
            return redirect('user-groups')->with('success','Group deleted successfully');
        }
    }
}
