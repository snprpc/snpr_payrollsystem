<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class SearchController extends Controller
{
    //
    function wageIndex ()
    {

      return view('search_wage');
    }

    function namewage (Request $request) {

    //  print_r($request->all());
      $credentials = $this->validate($request, [
        'input_name' => 'required',
      ]);
      $employee = \App\Model\Employee::where('ename',$request->input_name)->first();
      $wages = \App\Model\Wage::where('eid',$employee->eid)->first();

      $namewages = array_merge($wages->toArray(),$employee->toArray());

      // print_r($namewages);
      return view('search_wage',compact('namewages'));
    }
    function paywage (Request $request) {

      //print_r($request->all());
      if ( empty($request->minpay)) {
        # code...
        $minpay = '0';
      }else{
        $minpay = $request->minpay;
      }
      if (empty($request->maxpay)) {
        # code...
        $maxpay = '1000000';
      }else{
        $maxpay = $request->maxpay;
      }
      $minpay = intval($minpay);
      $maxpay = intval($maxpay) ;

    //$employee = \App\Model\Employee::where('ename',$request->input_name)->first();
      $wages = \App\Model\Wage::where('wpay','>=',$minpay)->where('wpay','<=',$maxpay)->get();
    //  print_r($wages->all());
      $employees = \App\Model\Employee::all();
      $emp_tmp = collect([]);
      foreach ($wages as $wage) {
        # code...
        $emp_tmp = $emp_tmp->push($employees->where('eid',$wage->eid)->first());
        // echo $emp_tmp->count();
        // echo "<br>";
      }
      $paywages = array_merge($wages->toArray(),$emp_tmp->toArray());
      $length = sizeof($paywages) / 2;
      $paymethod = 1;
      //print_r($paywages);
      return view('search_wage',compact('paywages','length','paymethod'));
     }
}
