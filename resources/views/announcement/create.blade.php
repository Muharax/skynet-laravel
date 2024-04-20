@php
    $categoriesController = app()->make(\App\Http\Controllers\CategoryController::class);
    $categories = $categoriesController->showAllCategories()->getData()['categories'];
@endphp

@include('layouts.header')
@include('topbar')

<div class="max-w-screen-lg mx-auto mt-8">
    <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto w-3/4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Tytuł:</label>
            <input type="text" value="xyz" name="title" id="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Opis:</label>
            <textarea name="description" id="description" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">xxx</textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Cena:</label>
            <input type="number" name="price" value="12.45" id="price" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Kategoria:</label>
            <select name="category" id="category" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Wybierz kategorię</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Zdjęcia (do 8 zdjęć, max 2MB każde):</label>
            <div class="flex flex-wrap -mx-2" id="image-preview-container">
                @for ($i = 0; $i < 8; $i++)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4 relative">
                        <label for="image{{ $i }}" class="block bg-gray-200 h-40 rounded-lg flex items-center justify-center cursor-pointer">
                            <span class="text-gray-600 text-2xl">+</span>
                            <input type="file" name="images[]" id="image{{ $i }}" accept="image/jpeg,image/png" class="hidden" onchange="previewImage(this)" required>
                        </label>
                    </div>
                @endfor
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj ogłoszenie</button>
        </div>
    </form>
</div>

@include('layouts.footer')

<script>
    function previewImage(input) {
        const file = input.files[0];
        const imgWrapper = input.parentNode;
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgSrc = e.target.result;
                
                const img = document.createElement('img');
                img.src = imgSrc;
                img.classList.add('h-full', 'w-full', 'object-cover', 'rounded-lg', 'absolute', 'top-0', 'left-0');
                
                const deleteIcon = document.createElement('span');
                deleteIcon.innerText = 'x';
                deleteIcon.classList.add('text-red-500', 'text-2xl', 'cursor-pointer', 'absolute', 'top-0', 'right-0', 'mr-2', 'mt-2');
                deleteIcon.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent the file input from triggering
                    imgWrapper.removeChild(img);
                    imgWrapper.removeChild(this);
                    input.value = ''; // Clear input value
                    imgWrapper.querySelector('span').classList.remove('hidden'); // Show "+" icon
                });
                
                imgWrapper.appendChild(img);
                imgWrapper.appendChild(deleteIcon);
                
                // Hide the "+" icon
                imgWrapper.querySelector('span').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            // Show the "+" icon
            imgWrapper.querySelector('span').classList.remove('hidden');
        }
    }
</script>

<style>
    #image-preview-container img {
        max-height: 100%;
        max-width: 100%;
    }

    #image-preview-container label {
        overflow: hidden;
    }
</style>
