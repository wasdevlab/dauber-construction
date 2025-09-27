<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Project
        </h2>
    </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('admin.projects') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Projects
                    </a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Project</h1>

                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Information -->
                                <div class="space-y-6">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title
                                            *</label>
                                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            required>
                                        @error('title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="slug"
                                            class="block text-sm font-medium text-gray-700">Slug</label>
                                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <p class="mt-1 text-xs text-gray-500">Leave empty to auto-generate from title
                                        </p>
                                        @error('slug')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="subtitle"
                                            class="block text-sm font-medium text-gray-700">Subtitle</label>
                                        <input type="text" name="subtitle" id="subtitle"
                                            value="{{ old('subtitle') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('subtitle')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700">Project
                                            Image</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        @error('image')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Project Information -->
                                <div class="space-y-6">
                                    <div>
                                        <label for="location"
                                            class="block text-sm font-medium text-gray-700">Location</label>
                                        <input type="text" name="location" id="location"
                                            value="{{ old('location') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('location')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="sector"
                                            class="block text-sm font-medium text-gray-700">Sector</label>
                                        <input type="text" name="sector" id="sector" value="{{ old('sector') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('sector')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="technology"
                                            class="block text-sm font-medium text-gray-700">Technology</label>
                                        <input type="text" name="technology" id="technology"
                                            value="{{ old('technology') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('technology')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="scope_of_work" class="block text-sm font-medium text-gray-700">Scope
                                            of Work</label>
                                        <input type="text" name="scope_of_work" id="scope_of_work"
                                            value="{{ old('scope_of_work') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('scope_of_work')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="completion_date"
                                            class="block text-sm font-medium text-gray-700">Completion Date</label>
                                        <input type="date" name="completion_date" id="completion_date"
                                            value="{{ old('completion_date') }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @error('completion_date')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                                checked
                                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                            <label for="is_active"
                                                class="ml-2 block text-sm text-gray-900">Active</label>
                                        </div>

                                        <div>
                                            <label for="order"
                                                class="block text-sm font-medium text-gray-700">Order</label>
                                            <input type="number" name="order" id="order"
                                                value="{{ old('order', 0) }}" min="0"
                                                class="mt-1 block w-24 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @error('order')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="mt-6">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <textarea name="content" id="content" rows="8"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- SEO Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta
                                        Title</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        value="{{ old('meta_title') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('meta_title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta
                                        Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="2"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex justify-end space-x-3 mt-8  gap-3">
                                <a href="{{ route('admin.projects') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
