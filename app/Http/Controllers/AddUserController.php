<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AddUserController extends Controller
{
	    use AuthenticatesUsers;

     protected function addUser(AddUserRequest $request)
    {

        $data = new User();
        
            $data->name = $request->name;
            $data->email =$request->email;
            $data->password= Hash::make($request->password);
            $data->mobile= $request->mobile;
            $data->address= $request->address;
            $data->gst_number = $request->gst_number;
            $data->nature_of_business= $request->nature_of_business;
            $data->street_address = $request->street_address;
            $data->save();
            return $data;
        
    }
    public function getUser()
    {
    	$data = User::all();
    	return $data;
    }
}
