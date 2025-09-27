<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Blog Post
            </h2>
            <a href="{{ route('admin.blogs') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium rounded-lg shadow-sm transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Blogs
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 text-red-800 border border-red-200">
                    <h3 class="font-medium text-red-800">Please fix the following errors:</h3>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Blog Post Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Fill in the details below to create a new blog post.</p>
                </div>
                
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div>
                                <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('excerpt') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">Brief description of the blog post (optional)</p>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                                <select name="status" id="status" 
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                            </div>

                            <div>
                                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="mt-1 text-sm text-gray-500">Upload a featured image for the blog post (optional)</p>
                            </div>

                            <div>
                                <label for="featured_image_alt" class="block text-sm font-medium text-gray-700">Featured Image Alt Text</label>
                                <input type="text" name="featured_image_alt" id="featured_image_alt" value="{{ old('featured_image_alt') }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p class="mt-1 text-sm text-gray-500">Describe the image for accessibility (optional)</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p class="mt-1 text-sm text-gray-500">SEO title for search engines (optional)</p>
                            </div>

                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('meta_description') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500">SEO description for search engines (optional)</p>
                            </div>

                            <div>
                                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                                <input type="text" name="tags" id="tags" value="{{ old('tags') }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                       placeholder="Enter tags separated by commas (e.g., construction, architecture, design)">
                                <p class="mt-1 text-sm text-gray-500">Separate multiple tags with commas (optional)</p>
                            </div>

                            <div class="flex items-center space-y-0">
                                <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="featured" class="ml-2 block text-sm text-gray-900">Featured Post</label>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Content -->
                    <div class="mt-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content *</label>
                        <textarea name="content" id="content" rows="12" 
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('content') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Main content of the blog post</p>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex items-center justify-end space-x-4 gap-3">
                        <a href="{{ route('admin.blogs') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create Blog Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Convert tags input to JSON format for backend processing
        document.querySelector('form').addEventListener('submit', function(e) {
            const tagsInput = document.getElementById('tags');
            if (tagsInput.value.trim()) {
                // Convert comma-separated tags to JSON array
                const tags = tagsInput.value.split(',').map(tag => tag.trim()).filter(tag => tag);
                tagsInput.value = JSON.stringify(tags);
            }
        });
    </script>
</x-app-layout>