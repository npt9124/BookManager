<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
USE Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use function Termwind\style;

session_start();
class AdminController extends Controller
{
    public function index(){
       return view('Admin_login');
    }
    public function Admin(){
        return view('Admin');
    }
    public function Adminn(){
        return view('Adminn');
    }
    public function show_dashboard(){
        return view('Dashboard');
    }
    public function Dashboard(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('admin')->where('email', $email)->where('password', $password)->first();

        if ($result) {
            Session::put('email', $result->email);
            Session::put('password', $result->password);
            return view('/Dashboard');
        } else {
            Session::put('message', 'Please re-enter your password');
            return view('/Admin_login');
        }
    } public function logout(){
    Session::put('email', null);
    Session::put('password', null);
    return redirect('/Admin_login');
}

}
