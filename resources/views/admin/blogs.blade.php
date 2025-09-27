<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-800 border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-lg bg-red-50 text-red-800 border border-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Header Section -->
            <div class="mb-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Blog Management</h1>
                        <p class="mt-2 text-sm text-gray-700">Manage all your blog posts and their content</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-900 font-medium rounded-lg shadow-sm border border-gray-300 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add New Blog Post
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Posts Table -->
            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200 mt-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">All Blog Posts</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($blogs as $blog)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if($blog->featured_image)
                                                <div class="flex-shrink-0 h-12 w-12">
                                                    <img class="h-12 w-12 rounded-lg object-cover border border-gray-200" src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0 h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $blog->title }}</div>
                                                <div class="text-sm text-gray-500">{{ $blog->excerpt ?: 'No excerpt' }}</div>
                                                @if($blog->tags && count($blog->tags) > 0)
                                                    <div class="mt-1">
                                                        @foreach(array_slice($blog->tags, 0, 3) as $tag)
                                                            <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded mr-1">{{ $tag }}</span>
                                                        @endforeach
                                                        @if(count($blog->tags) > 3)
                                                            <span class="text-xs text-gray-500">+{{ count($blog->tags) - 3 }} more</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                            @if($blog->status === 'published') bg-green-100 text-green-800 
                                            @elseif($blog->status === 'draft') bg-yellow-100 text-yellow-800 
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $blog->created_at->format('M j, Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $blog->author->name ?? 'Unknown' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2 gap-2">
                                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1 border border-red-300 text-xs font-medium rounded text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-gray-500">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">No blog posts</h3>
                                            <p class="mt-1 text-sm text-gray-500">Get started by creating your first blog post.</p>
                                            <div class="mt-6">
                                                <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                    Add Blog Post
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
