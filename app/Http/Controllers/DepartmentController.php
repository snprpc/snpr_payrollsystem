<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class DepartmentController extends Controller
{
    //
    function addIndex () {
      return view('add_department');
    }

    function store (Request $request) {
      //print_r($request->all());
      $credentials = $this->validate($request, [
        'dep_name' => 'required',
        'dep_phone' => 'required',
        'dep_no' => 'required'
      ]);

      $new_department = new \App\Model\Department;
      $new_department->dep_name = $request->dep_name;
      $new_department->dep_phone = $request->dep_phone;
      $new_department->dep_no = $request->dep_no;

      $new_department->save();
      return view('add_department');
    }
}
