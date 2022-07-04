<style>
        table {
            font-family:arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align:left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color:#dddddd;
        }
    </style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <form method="POST" action="{{ route('depot') }}">
            @csrf
                @if(session()->has('message'))
                <div style="color:green">{{session()->get('message')}}</div>
                @endif
            <!-- Amount -->
            <div>
                <x-label for="amount" :value="__('Enter the Amount')" />

                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
            </div>
<!-- Transaction Type-->
        <select id="transaction_type" class="block mt-1 w-full" type="text" name="transaction_type" :value="old('transaction_type')" required autofocus>
            <option value="deposit">Deposit</option>
            <option value="withdrawal">Withdrawal</option>
        </select>
<!--End  -->
            

            <div class="flex items-center justify-end mt-4">
              

              <x-button class="ml-3">
                  {{ __('Deposit/Withdrawal') }}
              </x-button>
              
          </div>
            </div>
        </form>
            <div style="text-align:center">
            <h2>Transaction History</h2>
            <table>
                <tr>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                </tr>
                <tr>                                   
                   @foreach($trans as $tran)
                   <td>{{$tran->transaction_type}}</td> 
                   <td>{{$tran->amount}}</td>                                   
                   </tr>
                   @endforeach
            </table>
            </div>
            </div>
            {{ $trans->links() }}
        </div>
    </div>
</x-app-layout>
