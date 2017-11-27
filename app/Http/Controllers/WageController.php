<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class WageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = \App\Model\Employee::all();
        //print_r($employees->toArray());
        $wages = \App\Model\Wage::all();
        //获取没有录入工资信息的员工
        $employee_unset = collect();

        $employees_id = $employees->keyBy('eid')->keys();
        $wages_id = $wages->keyBy('eid')->keys();
        $eid_unset = $employees_id->diffAssoc($wages_id)->toArray();
        //print_r($eid_unset);
        foreach ($eid_unset as $id) {

          $employee_unset = $employee_unset->push($employees->where('eid',$id)->first());
        }
        $employee = $employee_unset->first();
        // print_r($employee->toArray());
        //print_r($employee_unset->toArray());

        //
        // }
        return view('add_wage',compact('employee_unset','employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        print_r($request->all());
        $credentials = $this->validate($request, [
          'eid' => 'required',
          'wpay' => 'required',
          'wallowance' => 'required',
          'wovertime' => 'required',
          'wwithholding' => 'required'
        ]);
        //
        $new_wageinfo = new \App\Model\Wage;
        $new_wageinfo->eid = $request->eid;
        $new_wageinfo->wpay = $request->wpay;
        $new_wageinfo->wallowance = $request->wallowance;
        $new_wageinfo->wovertime = $request->wovertime;
        $new_wageinfo->wwithholding = $request->wwithholding;

        $new_wageinfo->save();
        return redirect()->route('wageinfo.create', [1]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $wages = \App\Model\Wage::all();
        $employees = \App\Model\Employee::all();
        $emp_tmp = collect([]);
        // echo $wages->count();
        // echo "<br>";
        // echo $emp_tmp->count();
        // echo "<br>";
        foreach ($wages as $wage) {
          # code...
          $emp_tmp = $emp_tmp->push($employees->where('eid',$wage->eid)->first());
          // echo $emp_tmp->count();
          // echo "<br>";
        }

        //echo $emp_tmp->count();
    //  print_r($wages->toArray());
    //  print_r($emp_tmp->toArray());
        $wages = array_merge($wages->toArray(),$emp_tmp->toArray());
        $length = sizeof($wages) / 2;
      //  print_r($wages);
      //  echo $wages[0]['eid'];
        return view('show_wage',compact('wages','length'));
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
        echo $id;
        print_r($request->all());
        //return redirect()->route('show_wage', [1]);
    }
    public function search () {

      return 8;
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
        return 7;
    }
}
