<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex">
         {{-- IMPORTANT: Can check roles on blade files like using '|' or Array --}}
        @if (Auth::user()->hasRole('admin|seller|buyer'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin Seller Buyer") }}
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole('admin|seller'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin Seller") }}
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->hasRole(['admin']))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin") }}
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="py-12 flex">
       @role('admin|seller|buyer')
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                   {{ __("Admin Seller Buyer") }}
               </div>
           </div>
       </div>
       @role('admin|seller')
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                   {{ __("Admin Seller") }}
               </div>
           </div>
       </div>
       @endrole
       @role('admin')
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                   {{ __("Admin") }}
               </div>
           </div>
       </div>
       @endrole
       @endrole
   </div>
</x-app-layout>
