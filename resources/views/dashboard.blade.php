<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="float:right">
                <x-button class="ml-3">
                   <a href="{{route('depot')}}"> {{ __('Deposit/Withdrawal') }}</a>
                </x-button>

                <x-button class="ml-3">
                    <a href="{{route('send')}}">{{ __('Transfer') }}</a>
                </x-button>
                </div>
            
            <div style="font-size:20px">    
            {{ __('User Details') }}
            </div>  
            @auth
            <div style="padding:12px; margin:20px; font-size:15px"> 
            <span style="padding:4px;">Name:</span>{{auth()->user()->name}}
            <span style="padding:12px;">Email:</span>{{auth()->user()->email}}
            </div>
            
            <div style="padding:12px; margin:20px; font-size:15px">
            <span style="padding:4px;">Phone:</span>{{auth()->user()->phone}}
            <span style="padding:12px;">Address:</span>{{auth()->user()->address}}
            <span style="padding:12px;">Gender:</span>{{auth()->user()->gender}}<br><br>
            <span>Balance::</span> {{auth()->user()->balance}}
            </div>

            @endauth
              

            </div>
        </div>
    </div>
</x-app-layout>
