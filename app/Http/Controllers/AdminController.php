<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 2;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
          'aname' => 'required',
          'apasswd' => 'required'
        ]);
        //print_r($request->all());
        $loginer = new \App\Model\admin\Admin;
        $loginer->aname = $request->aname;
        $loginer->apasswd = $request->apasswd;

        $admin = $loginer->where('aname',$loginer->aname)->first();
        // print_r($admin);
        if ( !$admin ) {
          session()->flash('false_name', '很抱歉，您的用户名不存在');
          return redirect()->back();
        }
        if ($loginer->apasswd != $admin->apasswd) {
          # code...
          session()->flash('false_passwd', '很抱歉，您的用户名和密码不匹配');
          return redirect()->back();
        }
        session()->flash('success', '欢迎回来！');
        $id = $admin->aid;
        return redirect()->route('admin.show', ['id' => $id]);
        //return 1;
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
        $admin = \App\Model\admin\Admin::where('aid',$id)->first();
        //print_r($admin);

        return view('index', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 5;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return 5;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return 6;
    }
}
