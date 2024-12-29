<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">Add New Blog</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table id="blogs-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description One</th>
                                <th>Main Image</th>
                                <th>Banner Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ Str::limit($blog->description_one, 50) }}</td>
                                    <td><img src="{{ asset('storage/' . $blog->main_image) }}" alt="Main Image" width="100"></td>
                                    <td><img src="{{ asset('storage/' . $blog->banner_image) }}" alt="Banner Image" width="100"></td>
                                    <td>
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
    <script>
        $(document).ready(function() {
            $('#blogs-table').DataTable();
        });
    </script>


</x-app-layout>
