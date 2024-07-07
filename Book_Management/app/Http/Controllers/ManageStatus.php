<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class ManageStatus extends Controller
{
    public function index()
    {
        $loan = Loan::with('readers')->get();
        return view('manage-status', compact('loan'));
    }
    public function update_status (Request $request, Loan $loan)
    {
        if ($request->action === 'return') {
            $loan->return_day = now()->toDateString();
        } elseif ($request->action === 'not_returned') {
            $loan->return_day = null;
        }

        $loan->save();

        return redirect()->route('manage-status');
    }
}
