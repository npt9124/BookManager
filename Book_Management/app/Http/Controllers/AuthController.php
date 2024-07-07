<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Events\AdminLoggedIn;
use App\Events\AdminLoggedOut;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin_login');
    }
    public function show_dashboard(){
        return view('Dashboard');
    }
    public function all_admin()
    {
        $all_admin = DB::table('admin')->get();
        return view('All_admin', ['all_admin' => $all_admin]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->has('remember'); // Kiem tra xem da chon remember hay chua

        $admin = Admin::where('email', $email)
            ->where('password', $password)
            ->first();

        if ($admin) {
            $admin->last_login_at = now(); // Gán giá trị thời gian hiện tại
            $admin->save();
            session()->put('email', $admin->email);

//         //luu tt
//            if ($remember) {
//                session()->put('remember', true);
//                session()->put('email', $admin->email);
//                session()->put('password', $admin->password);
//            } else {
//                // xoa tt neu k chon remember
//                session()->forget('remember');
//                session()->forget('email');
//                session()->forget('password');
//            }
            if (!session()->has('admin_logged_in')) {
                session()->put('admin_logged_in', true);
                event(new AdminLoggedIn($admin));
            }
            return redirect('/dashboard');
        } else {
            return redirect('/admin-login')->with('message', 'Username or password is incorrect');
        }
    }
    public function logout(){
        if (session()->has('admin_logged_in')) {
            session()->forget('admin_logged_in');
            $admin = Admin::where('email', session('email'))
                ->where('password', session('password'))
                ->first();
            if ($admin) {
                $admin->logout_at = now(); // Gán giá trị thời gian hiện tại
                $admin->save();
                event(new AdminLoggedOut($admin));

            }


            session()->forget('email');
            session()->forget('password');
        }
        return redirect('/Admin_login');
    }
    public function showRegistrationForm()
    {
        return view('Admin_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20',
            'gender' => 'required|max:255',
            'birthday' => 'required|date|before_or_equal:today',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'status' => 'required|max:255',

        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->gender = $request->gender;
        $admin->birthday = $request->birthday;
        $admin->address = $request->address;
        $admin->phone_number = $request->phone_number;
        $admin->status = $request->status;


        $admin->save();
            return redirect()->route('all-admin')->with('message', 'Register Successful!');
    }
    public function unactive_admin($admin_id)
    {
        DB::table('admin')->where('admin_id', $admin_id)->update(['status' => 1]);
        Session::put('message', 'Account activation successful');
        Session::flash('alert-class', 'alert-pink');
        return Redirect::to('all-admin');
    }

    public function active_admin($admin_id)
    {
        DB::table('admin')->where('admin_id', $admin_id)->update(['status' => 0]);
        Session::put('message', 'Deactivate account successful');
        Session::flash('alert-class', 'alert-pink');
        return Redirect::to('all-admin');
    }
    public function delete_admin($admin_id)
    {
        $admin = DB::table('admin')->where('admin_id', $admin_id)->first();

        if ($admin->status == 0) {
            DB::table('admin')->where('admin_id', $admin_id)->delete();
            Session::put('message', 'Delete account successful');
        } else {
            Session::put('message', 'You cannot delete this account');
        }

        return Redirect::to('all-admin');
    }
    public function edit_admin($admin_id)
    {
        $edit_admin = DB::table('admin')->where('admin_id', $admin_id)->get();
        return view('edit_admin', ['edit_admin' => $edit_admin]);
    }
    public function update_admin(Request $request, $admin_id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['gender'] = $request->gender;
        $data['birthday'] = $request->birthday;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;
        $data['status'] = $request->status;
        DB::table('admin')->where('admin_id', $admin_id)->update($data);
        Session::put('message', 'Successfully updated');
        Session::flash('alert-class', 'alert-pink');
        return Redirect::to('all-admin');
    }

}
