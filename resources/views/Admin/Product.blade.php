@extends('layouts.admin')
@section('content')
    @if(session('message'))
        <div class="rounded-md bg-green-50 p-4 mb-4" id="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{session('message')}}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endif


    <div class="flex justify-between items-center text-center">
       <div class="mb-6">
           <h1 class="text-gray-500  hover:text-gray-800 cursor-pointer">Products</h1>
       </div>
       <div class="mb-6">
           <a href="{{url('admin/add_product')}}" class="bg-gray-600 px-2 py-2 rounded-md text-white hover:bg-gray-900 flex">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
               </svg>
               Add New Product
           </a>
       </div>
   </div>



   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
       <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           <tr>
               <th scope="col" class="px-6 py-3">
                   <span class="sr-only">Image</span>
               </th>
               <th scope="col" class="px-6 py-3">
                   Product
               </th>
               <th scope="col" class="px-6 py-3">
                   Qty
               </th>
               <th scope="col" class="px-6 py-3">
                   Price
               </th>
               <th scope="col" class="px-6 py-3">
                   Action
               </th>
           </tr>
           </thead>
           <tbody>
           @foreach($products as $product)
           <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
               <td class="w-32 p-4">
                   <img src="{{$product->image_id}}" alt="Apple Watch">
               </td>
               <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                   Apple Watch
               </td>
               <td class="px-6 py-4">
                   <div class="flex items-center space-x-3">
                       <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                           <span class="sr-only">Quantity button</span>
                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                           </svg>
                       </button>
                       <div>
                           <input value="{{$product->qty}}" type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="{{$product->qty}}" required>
                       </div>
                       <button class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                           <span class="sr-only">Quantity button</span>
                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                           </svg>
                       </button>
                   </div>
               </td>
               <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                   ${{$product->price}}
               </td>
               <td class="px-6 py-4">
                   <a href="{{url('admin/delete_product/'.$product->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                   /
                   <a href="{{url('admin/edit_product/'.$product->id)}}" class="font-medium text-blue-600 dark:text-blue-700 hover:underline">Edit</a>
               </td>
           </tr>
           @endforeach
           </tbody>
       </table>
       <div class="pt-4 pb-4 ps-2 pe-2">
           {{$products->links()}}
       </div>
   </div>
<script>
    setTimeout(function (){
        document.getElementById('alert').style.display='none';
    },3000)
</script>
@endsection
