<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    //
    function addIndex () {
      $departments = \App\Model\Department::all();

      return view('add_employee',compact('departments'));
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

      $employee = \App\Model\Employee::where('ename',$request->ename)->first();
      // print_r($employee->toArray());
      $department = \App\Model\Department::where('dep_name',$request->dep_name)->first();
      // print_r($department->toArray());
      $employeeDep = new \App\Model\EmployeeToD;
      $employeeDep->eid = $employee->eid;
      $employeeDep->dep_id = $department->dep_id;
      $employeeDep->is_directory = 0;
      // print_r($employeeDep->toArray());
      $employeeDep->save();

      return redirect()->route('add_employee',['id'=>1]);
    }

    function addDirector ()
    {
      $departments = \App\Model\Department::all();
      return view('add_director',compact('departments'));
    }
    function searchByDid (Request $request)
    {
      $employees_id = \App\Model\EmployeeToD::where('dep_id',$request->dep_id)->get();
      // print_r($employees_id->toArray());
      $employees = \App\Model\Employee::all();
      $emp_dep = collect();
      foreach ($employees_id as $employee_id) {
        // echo $employee_id->eid;
        $emp_dep = $emp_dep->push($employees->where('eid',$employee_id->eid)->first());
      }

      return $emp_dep;
    }

    function addEmpToDir (Request $request)
    {
      $employees_id = \App\Model\EmployeeToD::where('eid',$request->eid)->update(['is_directory'=>1]);

    }

}
