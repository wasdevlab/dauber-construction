<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de Bord Admin
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Bon retour !</h3>
                            <p class="text-gray-600 mt-2">Gérez le contenu et les paramètres de votre site web de construction.</p>
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ now()->format('l, F j, Y') }}
                        </div>
                    </div>
                    
                    <!-- Quick Stats -->
                    <div class="gap-6 flex justify-between">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-blue-100">Images Galerie</h4>
                                    <p class="text-3xl font-bold mt-2">{{ $galleryCount }}</p>
                                </div>
                             
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-green-100">Articles Publiés</h4>
                                    <p class="text-3xl font-bold mt-2">{{ $publishedBlogsCount }}</p>
                                </div>
                              
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-purple-100">Total Articles</h4>
                                    <p class="text-3xl font-bold mt-2">{{ $totalBlogsCount }}</p>
                                </div>
                             
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-orange-100">Projets</h4>
                                    <p class="text-3xl font-bold mt-2">{{ $projectsCount }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Management Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            </svg>
                            Gestion du Contenu
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.gallery') }}" class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-lg mr-3 group-hover:bg-blue-200">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Gestion de la Galerie</h4>
                                        <p class="text-sm text-gray-500">Gérer les images de projets et éléments de galerie</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('admin.blogs') }}" class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-green-100 p-2 rounded-lg mr-3 group-hover:bg-green-200">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Gestion des Articles</h4>
                                        <p class="text-sm text-gray-500">Créer et gérer les articles de blog</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('admin.projects') }}" class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-orange-100 p-2 rounded-lg mr-3 group-hover:bg-orange-200">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Gestion des Projets</h4>
                                        <p class="text-sm text-gray-500">Gérer les projets de construction</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Create Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Création Rapide
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.gallery.create') }}" class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-blue-500 p-2 rounded-lg mr-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Nouvel Élément Galerie</h4>
                                        <p class="text-sm text-gray-500">Ajouter une nouvelle image à la galerie</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-blue-600 group-hover:text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('admin.blogs.create') }}" class="flex items-center justify-between p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-green-500 p-2 rounded-lg mr-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Nouvel Article</h4>
                                        <p class="text-sm text-gray-500">Rédiger un nouvel article de blog</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-green-600 group-hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-between p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors duration-200 group">
                                <div class="flex items-center">
                                    <div class="bg-orange-500 p-2 rounded-lg mr-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Nouveau Projet</h4>
                                        <p class="text-sm text-gray-500">Ajouter un projet de construction</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-orange-600 group-hover:text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
