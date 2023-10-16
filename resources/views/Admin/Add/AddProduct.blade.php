@extends('layouts.admin')
@section('content')
    <style>
        #preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>

    <h1 class="text-gray-500  hover:text-gray-800 cursor-pointer">Add New Product</h1>
    <form action="{{url('admin/store_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required>
        </div>
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
            <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100" required>
        </div>
        <div class="mb-6">
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Product description</label>
                <div class="mt-2">
                    <textarea rows="4" required name="description" id="description" class="block w-full p-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Quantity</label>
            <input type="number"  id="quantity" name="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12" required>
        </div>

        <div class="mb-6">
            <div class="col-span-full">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <input id="file-upload" name="image" accept="image/*" type="file" class="sr-only" onchange="previewImage(event)">
                        <div id="image-preview"></div>
                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" type="file" class="sr-only" onchange="previewImage(event)">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>




    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('image-preview');

            // Check if a file is selected
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create an image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.id = 'preview-image';

                    // Clear any previous preview
                    imagePreview.innerHTML = '';

                    // Append the image to the preview container
                    imagePreview.appendChild(img);
                };

                // Read the selected file as a data URL
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>

@endsection
