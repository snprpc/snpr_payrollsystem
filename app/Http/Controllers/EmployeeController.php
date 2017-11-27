<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    //
    function addIndex () {
      return view('add_employee');
    }

    function store (Request $request) {
      //print_r($request->all());
      $credentials = $this->validate($request, [
        'ename' => 'required',
        'esex' => 'required',
        'ebirth' => 'required',
        'eplace' => 'required',
        'enation' => 'required',
        'estatus' => 'required',
        'epicture' => 'required',
        'ephone' => 'required',
        'eaccout' => 'required'
      ]);
      //
      $new_employee = new \App\Model\Employee;
      $new_employee->ename = $request->ename;
      $new_employee->esex = $request->esex;
      $birth = $request->ebirth;
      $new_employee->ebirth = Carbon::createFromFormat('Y-m',$birth);
      $new_employee->eplace = $request->eplace;
      $new_employee->enation = $request->enation;
      $new_employee->estatus = $request->estatus;
      $new_employee->epicture = $request->epicture;
      $new_employee->ephone = $request->ephone;
      $new_employee->eaccout = $request->eaccout;
      $new_employee->save();
      return view('add_employee');
    }

}
