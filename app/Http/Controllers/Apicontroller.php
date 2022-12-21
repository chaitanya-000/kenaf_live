<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Userregister;

class ApiController extends Controller
{
    function appverison()
    {
    return response()->json(['name' => 'testing', 'state' => 'NO Database']);
    }


    function user(Request $data)
    {
        
        try
        {
            $res=Userregister::where('id',$data->id)->orderBy('id', 'DESC')->get();
            $data=[
                    'status'=>'True',
                    'data'=>$res,
                    ]; 
            // dd($res);
        }
        catch(\Exception $e)
        {
            $data=[
                    'status'=>'false',
                    'data'=>"NO Data Found",
                    ];  
        }
        return response()->json($data);
    
      
    }
    

    function appuserregister(Request $data)
    {
        try
        {
        	$res=new Userregister();
        	$res->uId="appUser_".rand(11111,999999);
        	$res->firstName=$data->firstName;
    		$res->lastName=$data->lastName;
    		$res->email=$data->email;
        	$res->password=$data->password;
            $res->save();
              $data=[
                    'status'=>'true',
                    'data'=>'Account created Successfully'];
        }
        catch (\Exception $e)
        {
                $data=[
                        'status'=>'false',
                        'data'=>'Already Account Exists For Same Data',
                        'error'=>$e
                ];
               // dd($e->getMessage());
                //throw new HttpException(500, $e);
        }
    	
	    return response()->json($data);
    }
    

    function applogincheckusers(Request $data)
    {
        try 
        { 
            $email=$data->email;
            $password=$data->password;
            $chk=$data->email;
                $res=Userregister::select("*")->where('email',$email)->first();
                if(strcmp($res->password,$password))
                {
                     $data=[
                    'status'=>'false',
                    'data'=>' Invalid Credentails',
                     'userId'=>"0000",
                     'firstname'=>"0000",
                     'email'=>"0000",
                     ];  
                }
                else
                {
                  $data=[
                    'status'=>'true',
                    'data'=>'Login Successfully',
                     'user_id'=>"".$res->uId,
                     'firstname'=>"".$res->firstName,
                     'lastName'=>"".$res->lastName,
                     'email'=>"".$res->email,
                    ];
                }            
        }
        catch (\Exception $e) 
        {
             $data=[
                    'status'=>'false',
                    'data'=>'Invalid Credentails',
                       
                ];
              //  dd($data);
        }
        return response()->json($data);
          //  dd($data);

    }
    
    
}   
