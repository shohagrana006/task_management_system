<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    <br>
                    <a 
                        style="padding: 7px 10px;
                               display: block;
                               width: 15%;
                               font-size: 14px;
                               background-color: #000000a8;
                               color: #f1f1f1"
                        href="{{route('admin.tasks.index')}}">{{ __("Click to enter task") }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
