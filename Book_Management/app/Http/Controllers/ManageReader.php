<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class ManageReader extends Controller
{
    public function add_reader()
    {
        return view('Add_reader');
    }

    public function all_reader()
    {
        $all_reader = DB::table('readers')->get();
        return view('All_reader', ['all_reader' => $all_reader]);
    }

    public function save_reader(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender ;
        $data['phone_number'] = $request->phone_number ;
        $data['total_num_books_borrowed'] = $request->total_num_books_borrowed ;
        $data['birthday'] = $request->birthday ;
        $data['status'] = $request->status ;

        DB::table('readers')->insert($data);
        Session::put('message','Add reader successful ');
        return Redirect::to('all-reader');
    }

    public function unactive_reader($reader_id)
    {
        DB::table('readers')->where('reader_id', $reader_id)->update(['status' => 1]);
        Session::put('message','Active falure');
        return Redirect::to('all-product');
    }

    public function active_reader($reader_id)
    {
        DB::table('readers')->where('reader_id', $reader_id)->update(['status' => 0]);
        Session::put('message','Active successful');
        return Redirect::to('all-reader');
    }

    public function edit_reader($reader_id)
    {
        $edit_reader = DB::table('readers')->where('reader_id', $reader_id)->get();
        return view('edit_reader', ['edit_reader' => $edit_reader ]);
    }

    public function update_reader(Request $request, $reader_id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender ;
        $data['phone_number'] = $request->phone_number ;
        $data['total_num_books_borrowed'] = $request->total_num_books_borrowed ;
        $data['birthday'] = $request->birthday ;
        $data['status'] = $request->status ;

        DB::table('readers')->where('reader_id', $reader_id)->update($data);
        Session::put('message','Update information successful');
        return Redirect::to('all-reader');

    }

    public function delete_reader($reader_id)
    {
        DB::table('readers')->where('reader_id', $reader_id)->delete();
        Session::put('message','Delete successful');
        return Redirect::to('reader');
    }
}
