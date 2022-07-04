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
                
                <form action="{{route('gift')}}" method="post">
            @csrf
              <div>
                @if(session()->has('message'))
                <div class='alert alert-info'>
                    {{session()->get('message')}}
    </div>
                @endif
                <x-label for="amount" :value="__('Enter the Amount')" />

                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
            </div>

             <div>
                <x-label for="transaction_type" :value="__('User Id')" />

                <x-input id="transaction_type" class="block mt-1 w-full" type="text" placeholder="Enter user id" name="id" :value="old('transaction_type')" required autofocus />
            </div> 

            <div class="flex items-center justify-end mt-4">
              

                <x-button class="ml-3">
                    {{ __('Transfer') }}
                </x-button>
            </div>  
            </form>
            
 
            

            </div>
        </div>
    </div>
</x-app-layout>
