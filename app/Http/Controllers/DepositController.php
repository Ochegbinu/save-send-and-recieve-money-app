<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;

class DepositController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $trans = Transaction::where('user_id', $id)->get();
        $trans = Transaction::paginate(6);
        return view('deposit',compact('trans'));

    }

    public function store(Request $request)
    {
        $user = Auth::user();

        switch($request->transaction_type){
            case 'deposit':
            if($request->amount > 1000){
                return back()->with('message', 'You can no longer credit your Account');
            }else{
                $user->balance = $user->balance + $request->amount;
            }
            break;
            case 'withdrawal':
            if($request->amount > $user->balance){
                return redirect()->back()->with('message', 'Insufficient Balance');
            }else{
                $user->balance = $user->balance - $request->amount;
            }
        }
        
        $user->save();


        $trans = Transaction::create([
            'transaction_type' => $request->transaction_type,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
        ]);
        return redirect()->back()->with('message', 'Your account has been credited successfully');
    }
}
