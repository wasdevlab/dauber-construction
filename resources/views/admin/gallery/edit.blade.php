<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Gallery Item
        </h2>
    </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('admin.gallery') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Gallery
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-bold text-gray-900">Edit Gallery Item</h1>
                            <!-- Current Image Preview -->
                            @if($gallery->image_path)
                                <div class="flex-shrink-0">
                                    <img src="{{ asset($gallery->image_path) }}" 
                                         alt="{{ $gallery->image_alt ?: $gallery->title }}"
                                         class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Information -->
                                <div class="space-y-6">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                                        <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            required>
                                        @error('title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="project_type" class="block text-sm font-medium text-gray-700">Project Type *</label>
                                        <select name="project_type" id="project_type"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            required>
                                            <option value="">Select project type</option>
                                            <option value="residential" {{ old('project_type', $gallery->project_type) == 'residential' ? 'selected' : '' }}>Residential</option>
                                            <option value="commercial" {{ old('project_type', $gallery->project_type) == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                            <option value="industrial" {{ old('project_type', $gallery->project_type) == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                            <option value="infrastructure" {{ old('project_type', $gallery->project_type) == 'infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                                            <option value="renovation" {{ old('project_type', $gallery->project_type) == 'renovation' ? 'selected' : '' }}>Renovation</option>
                                            <option value="other" {{ old('project_type', $gallery->project_type) == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('project_type')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="image_alt" class="block text-sm font-medium text-gray-700">Image Alt Text</label>
                                        <textarea name="image_alt" id="image_alt" rows="4"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder="Describe the image for accessibility...">{{ old('image_alt', $gallery->image_alt) }}</textarea>
                                        <p class="mt-1 text-xs text-gray-500">Helps with SEO and accessibility. Describe what's shown in the image.</p>
                                        @error('image_alt')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700">Update Gallery Image (Optional)</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                                        @error('image')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Display Settings -->
                                <div class="space-y-6">
                                    <div>
                                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}"
                                            min="0"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first. Use 0 for default ordering.</p>
                                        @error('sort_order')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" name="featured" id="featured" value="1"
                                            {{ old('featured', $gallery->featured) ? 'checked' : '' }}
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="featured" class="ml-2 block text-sm text-gray-900">Mark as Featured</label>
                                    </div>
                                    <p class="text-xs text-gray-500">Featured items may appear prominently on the website.</p>

                                    <!-- Gallery Info -->
                                    <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                                        <h4 class="text-sm font-semibold text-gray-900">Gallery Details</h4>
                                        <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                                            <div>
                                                <span class="font-medium">ID:</span> #{{ $gallery->id }}
                                            </div>
                                            <div>
                                                <span class="font-medium">Created:</span> {{ $gallery->created_at->format('M d, Y') }}
                                            </div>
                                            <div>
                                                <span class="font-medium">Updated:</span> {{ $gallery->updated_at->format('M d, Y') }}
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <span class="font-medium">Status:</span>
                                                @if($gallery->featured)
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Featured</span>
                                                @endif
                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex justify-end space-x-3 mt-8">
                           
                                
                                <div class="flex space-x-3 gap-2">
                                    <a href="{{ route('admin.gallery') }}"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update Gallery Item
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>