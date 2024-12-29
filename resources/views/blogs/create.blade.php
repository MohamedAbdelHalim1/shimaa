<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description_one" class="block text-gray-700 text-sm font-bold mb-2">Description One:</label>
                            <textarea name="description_one" id="description_one" rows="5" 
                                      class="tinymce-editor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description_one') }}</textarea>
                            @error('description_one')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description_two" class="block text-gray-700 text-sm font-bold mb-2">Description Two (optional):</label>
                            <textarea name="description_two" id="description_two" rows="5" 
                                      class="tinymce-editor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description_two') }}</textarea>
                            @error('description_two')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="main_image" class="block text-gray-700 text-sm font-bold mb-2">Main Image:</label>
                            <input type="file" name="main_image" id="main_image" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('main_image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="banner_image" class="block text-gray-700 text-sm font-bold mb-2">Banner Image:</label>
                            <input type="file" name="banner_image" id="banner_image" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('banner_image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image_gallery_one" class="block text-gray-700 text-sm font-bold mb-2">Image Gallery One (optional):</label>
                            <input type="file" name="image_gallery_one" id="image_gallery_one" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('image_gallery_one')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image_gallery_two" class="block text-gray-700 text-sm font-bold mb-2">Image Gallery Two (optional):</label>
                            <input type="file" name="image_gallery_two" id="image_gallery_two" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('image_gallery_two')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image_gallery_three" class="block text-gray-700 text-sm font-bold mb-2">Image Gallery Three (optional):</label>
                            <input type="file" name="image_gallery_three" id="image_gallery_three" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('image_gallery_three')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <button type="submit" class="btn btn-primary">Create Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/inmxad5elerar3o23v0ryu5pym93y2l1ecxuitf3bac1gmon/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.tinymce-editor',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | preview',
            height: 300
        });
    </script>
</x-app-layout>
