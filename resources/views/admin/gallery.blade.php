<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion de la Galerie
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
                        <h1 class="text-2xl font-bold text-gray-900">Gestion de la Galerie</h1>
                        <p class="mt-2 text-sm text-gray-700">Gérez toutes vos images de galerie et leurs détails</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-900 font-medium rounded-lg shadow-sm border border-gray-300 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Ajouter une Nouvelle Image
                        </a>
                    </div>
                </div>
            </div>


            <!-- Gallery Grid -->
            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200 mt-4">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Toutes les Images de la Galerie</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
                    @forelse($galleries as $gallery)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                            <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->image_alt ?: $gallery->title }}" class="w-full h-48 object-cover">
                            </div>
                            <div class="p-4">
                                <h4 class="font-medium text-gray-900 mb-2 truncate">{{ $gallery->title }}</h4>
                                <p class="text-sm text-gray-600 mb-3 truncate">{{ $gallery->project_type }}</p>
                                <div class="flex items-center mb-3">
                                    @if($gallery->featured)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            En Vedette
                                        </span>
                                    @endif
                                    <span class="ml-2 text-xs text-gray-500">Ordre : {{ $gallery->sort_order }}</span>
                                </div>
                                <div class="flex space-x-2 gap-2">
                                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Modifier
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément de la galerie ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-red-300 text-xs font-medium rounded text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="text-center py-12">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune image dans la galerie</h3>
                                <p class="mt-1 text-sm text-gray-500">Commencez par ajouter votre première image de galerie.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Ajouter Image Galerie
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
