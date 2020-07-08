<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::latest()->paginate(7);
    	return view('customer.customer',compact('data'));
    }

    public function add(Request $request)
    {
    	$insert = Customer::insert([

    		'name'=>$request['name'],
    		'phone'=>$request['phone'],
    		'email'=>$request['email'],
    		'location'=>$request['location'],
    		'created_at'=>Carbon::now('asia/dhaka')->toDateTimeString(),

    	]);

    	if($insert){
    		return response()->json('success');
    	}else{
    		return response()->json('error');
    	}
    }

    public function getData()
    {
       $data = Customer::latest()->paginate(7);
       return view('customer.response',compact('data'));
    }

    public function viewData(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        return $customer;
    }

        public function editData(Request $request){
        $id = $request->id;
        $data = Customer::find($id);
        return $data;
    }

    public function updatetData(Request $request)
    {
        $id = $request->id;
        $update = Customer::where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'location'=>$request->location,
            'updated_at'=>Carbon::now('asia/dhaka')->toDateTimeString(),

        ]);
        
         if($update){
                return response()->json('success');
            }else{
                return response()->json('error');
            }
    }

    public function deleteData(Request $request){
        $id = $request->id;
        $delete = Customer::where("id", $id)->delete();
        if($delete){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }



}

