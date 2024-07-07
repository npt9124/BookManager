<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Loan;
use App\Models\Reader;
use Illuminate\Support\Facades\Redirect;

use Session;
use DB;
class LoanController extends Controller
{
    public function all_loan()
    {
//        $all_loan = DB::table('loan')->select('loan.*', 'readers.name', 'readers.email', 'readers.address', 'readers.gender', 'readers.phone_number','readers.total_num_books_borrowed', 'readers.birthday','readers.status','readers.phone_number')->join('readers', 'loan.reader_id', '=', 'readers.reader_id')
//
//            ->get();
//        $all_loan = Loan::join('readers', 'loan.phone_number', '=', 'readers.phone_number')
//            ->select('loan.loan_id', 'loan.borrowed_day', 'loan.return_day', 'loan.num_books_on_loan',
//                'readers.name', 'readers.email', 'readers.address', 'readers.gender',
//                'readers.total_num_books_borrowed', 'readers.birthday', 'readers.status')
//            ->get();
//        $all_loan = DB::table('loan')->join('readers', 'loan.loan_id', '=', 'readers.reader_id')->select('loan.loan_id', 'loan.borrowed_day', 'loan.return_day', 'loan.num_books_on_loan',
//            'readers.name', 'readers.email', 'readers.address', 'readers.gender',
//            'readers.total_num_books_borrowed', 'readers.birthday', 'readers.status')
//            ->get();
//        $all_loan = DB::table('loan')->get();
        $all_loan = Loan::with('readers')->get();
        return view('All_loan', ['all_loan' => $all_loan]);
    }

    public function create()
    {
        return view('Add_loan');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loan_id' => 'required|integer',
            'borrowed_day' => 'required|date',
            'return_day' => 'required|date',
            'num_books_on_loan' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'total_num_books_borrowed' => 'required|integer',
            'birthday' => 'required|date',

//            'reader_id' => 'required|exists:readers,id',
        ]);
        if ($validator->fails()) {
            return redirect()->route('add-loan')->withErrors($validator)->withInput();
        }
        $loan = new Loan;
        $loan->loan_id = $request->loan_id;
        $loan->borrowed_day = $request->borrowed_day;
        $loan->return_day = $request->return_day;
        $loan->name = $request->name;
        $loan->email = $request->email;
        $loan->address = $request->address;
        $loan->gender = $request->gender;
        $loan->total_num_books_borrowed = $request->total_num_books_borrowed;
        $loan->birthday = $request->birthday;



        $loan->save();


        return redirect()->route('all-loan')->with('message', 'Loan created successfully.');
    }

    public function edit($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        $readers = Reader::all();
        return view('loan.edit', compact('loan', 'readers'));
    }

    public function update(Request $request, $loan_id)
    {
        $request->validate([
            'borrowed_day' => 'required|date',
            'return_day' => 'required|date',
        ]);

        $loan = Loan::findOrFail($loan_id);
        $loan->update($request->all());

        return redirect()->route('loan.index')->with('success', 'Loan updated successfully.');
    }

    public function destroy($loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        $loan->delete();

        return redirect()->route('loan.index')->with('success', 'Loan deleted successfully.');
    }
    public function save_loan(Request $request)
    {

        $data = array();
        $data['borrowed_day'] = $request->borrowed_day;
        $data['return_day'] = $request->return_day;
        $data['num_books_on_loan'] = $request->num_books_on_loan ;
        $data['phone_number'] = $request->phone_number ;


        DB::table('loan')->insert($data);
        Session::put('message','Add loan successful');
        return Redirect::to('all-loan');

        }
        public
        function edit_loan($loan_id)
        {
            $edit_loan = DB::table('loan')->where('loan_id', $loan_id)->get();
            return view('edit_loan', ['edit_loan' => $edit_loan]);
        }

        public
        function delete_loan($loan_id)
        {
            DB::table('loan')->where('loan_id', $loan_id)->delete();
            Session::put('message', 'Delete loan successful');
            return Redirect::to('all-loan');
        }
    }
