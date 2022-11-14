<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
	
	
    function index()
	{
		return view('login');
	}
	
	function checklogin(Request $request)
	{
		 if($request->isMethod('post')){
            $data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                //echo "Success"; die;
				/*Session::put('adminSession',$data['email']);*/
				  //$research = DB::table('users')->where('user_id', Auth::id())->get();
				 // echo $research; die;
       			 return redirect('dashboard');
            }else{
                //echo "failed"; die;
               return redirect('/login')->with('error', 'Invailed Username and Password');
            }
        }
        return view('/login');
	}
	
	 public function dashboard(){
        /*if(Session::has('adminSession')){
            //Perform all dashboard tasks
        }else{
            return redirect('/admin')->with('flash_message_error','Please login to access');
        }*/
        return view('dashboard');
    }
	
	function logout()
	{
		Session::flush();
		return redirect('login');
	}
	
}
