<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin;
class LoginController extends Controller
{
    //
    function show () {
      return view('admin.login');
    }

    function verify (Request $request) {
      //print_r($request->all());
      $loginer = new \App\Model\admin\Admin;
      $loginer->aname = $request->aname;
      $loginer->apasswd = $request->apasswd;

      if ($loginer->aname == null && $loginer->apasswd == 0) {
        # code...
        return back()->withInput();
      }
      $admin = $loginer->where('aname',$loginer->aname)->firstOrFail();
      //echo $admin->aname;

      if ($loginer->apasswd != $admin->apasswd) {
        # code...
        return back()->withInput();
      }
      return redirect()->route('/snprpc/payrollsystem/index.index', [$admin]);
    }
    function index ($admin) {

      return view('index',compact['admin']);
    }

}
