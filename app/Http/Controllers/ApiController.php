<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SavedValues;
class ApiController extends Controller
{
	public function errormsg($error,$errorcode)
	{
		 return response()->json([
          "error" => $error
        ], $errorcode);
		 
	}
	public function additionOp(Request $request) {
		if(!isset($request->num1)|| !isset($request->num2))
		{
			return $this->errormsg('Please enter both values',404);
		}
		else
		{
			$num1 = isset($request->num1)? $request->num1:'';
			$num2 = isset($request->num2)? $request->num2:'';
			$total = $num1+$num2;
		
      		return response()->json(["answer" => $total], 200);
		}
		
	}
	public function subtractOp(Request $request) {
		if(!isset($request->num1)|| !isset($request->num2))
		{
			return $this->errormsg('Please enter both values',404);
		}
		else
		{
			$num1 = isset($request->num1)? $request->num1:'';
			$num2 = isset($request->num2)? $request->num2:'';
	      	$total = $num1-$num2;
	      return response()->json([
	          "answer" => $total
	        ], 200);
	    }
	}
	public function multiplyOp(Request $request) {
		if(!isset($request->num1)|| !isset($request->num2))
		{
			return $this->errormsg('Please enter both values',404);
		}
		else
		{
			$num1 = isset($request->num1)? $request->num1:'';
			$num2 = isset($request->num2)? $request->num2:'';
			$total = $num1*$num2;

	      return response()->json([
	          "answer" => $total
	        ], 200);
	    }
    }
	public function divideOp(Request $request) {
		if(!isset($request->num1)|| !isset($request->num2))
		{
			return $this->errormsg('Please enter both values',404);
		}
		else
		{
			$num1 = isset($request->num1)? $request->num1:'';
			$num2 = isset($request->num2)? $request->num2:'';
	      	$total = $num1/$num2;
	      
	      	return response()->json([
	          "answer" => $total
	        ], 200);
	    }
	}
	public function sqrtOp(Request $request) {
		if(!isset($request->num1))
		{
			return $this->errormsg('Please enter the values',404);
		}
		else
		{
			$num1 = isset($request->num1)? $request->num1:'';
	      	$total = sqrt($num1);
	      	return response()->json([
	          "answer" => $total
	        ], 200);
	    }

	}
	public function saveOp(Request $request) {
		if(!isset($request->value))
		{
			return $this->errormsg('Please enter the value',404);
		}
		else
		{
			$request->session()->put('savevalue', $request->value);
			/*
				This code is for save in database
			$value = isset($request->value)? $request->value:'';
			$input_arr = array("savedvalue"=>$value);
	        $total = SavedValues::create($input_arr);*/
	      	return response()->json([
	          "save" => true
	        ], 200);
	    }
	}
	public function retrieveOp(Request $request) {
		$value = $request->session()->get('savevalue');

	       /* This code is used to retrieve code from database
	       	 $savevalues = SavedValues::all();
	        if(count($savevalues)==0)
	        	$savevalues = 'No Records found'; $savevalues->savedvalue*/
	      	return response()->json([
	          "value" => $value
	        ], 200);
	}
	public function deleteOp(Request $request){
		/*SavedValues::truncate();*/
		$request->session()->forget('savevalue');
		return response()->json([
	          "value" => $request->session()->get('savevalue')
	        ], 200);
	}
}
?>