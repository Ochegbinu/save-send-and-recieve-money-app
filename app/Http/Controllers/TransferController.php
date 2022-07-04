<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

use Auth;

class TransferController extends Controller
{
    public function show()
    {
        return view('transfer');
    }

    public function shear(Request $request)
    {
   
    $reciever = User::findOrFail($request->id);
    $sender = Auth::user();
   
   if($sender->balance < $request->amount){
       return back()->with('message', 'You have insufficient balance');
   }
   
   $balance = $sender->balance - $request->amount;
   
   $sender->update([
       'balance' => $balance,
   ]);
   
   $reciever->update([
       'balance' => $reciever->balance + $request->amount,
   ]);
   
   return back()->with('message', 'Amount transfered successfully.');
   
    }
     
       
   
   }