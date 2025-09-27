<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $galleryCount = Gallery::count();
        $publishedBlogsCount = Blog::where('status', 'published')->count();
        $totalBlogsCount = Blog::count();
        $projectsCount = Project::count();
        
        return view('admin.dashboard', compact('galleryCount', 'publishedBlogsCount', 'totalBlogsCount', 'projectsCount'));
    }

    /**
     * Display the gallery management page.
     */
    public function gallery()
    {
        $galleries = Gallery::ordered()->get();
        return view('admin.gallery', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function createGallery()
    {
        return view('admin.gallery.create');
    }

    /**
     * Show the form for editing a gallery item.
     */
    public function editGallery(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Store a new gallery item.
     */
    public function storeGallery(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'featured' => 'boolean'
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        $gallery = Gallery::create([
            'title' => $request->title,
            'project_type' => $request->project_type,
            'image_path' => 'storage/' . $imagePath,
            'image_alt' => $request->image_alt,
            'sort_order' => $request->sort_order ?? 0,
            'featured' => $request->boolean('featured', false)
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Gallery item created successfully');
    }

    /**
     * Update a gallery item.
     */
    public function updateGallery(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'featured' => 'boolean'
        ]);

        $data = [
            'title' => $request->title,
            'project_type' => $request->project_type,
            'image_alt' => $request->image_alt,
            'sort_order' => $request->sort_order ?? 0,
            'featured' => $request->boolean('featured', false)
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $gallery->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image_path));
            }
            
            $imagePath = $request->file('image')->store('gallery', 'public');
            $data['image_path'] = 'storage/' . $imagePath;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery')->with('success', 'Gallery item updated successfully');
    }

    /**
     * Delete a gallery item.
     */
    public function destroyGallery(Gallery $gallery)
    {
        // Delete image file
        if ($gallery->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $gallery->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image_path));
        }

        $gallery->delete();

        return redirect()->route('admin.gallery')->with('success', 'Gallery item deleted successfully');
    }

    /**
     * Display the blog management page.
     */
    public function blogs()
    {
        $blogs = Blog::with('author')->orderBy('created_at', 'desc')->get();
        return view('admin.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function createBlog()
    {
        return view('admin.blogs.create');
    }

    /**
     * Show the form for editing a blog post.
     */
    public function editBlog(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Store a new blog post.
     */
    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_alt' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image_alt' => $request->featured_image_alt,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'tags' => $request->tags ? json_decode($request->tags, true) : [],
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'author_id' => $request->user()->id
        ];

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
            $data['featured_image'] = 'storage/' . $imagePath;
        }

        $blog = Blog::create($data);

        return redirect()->route('admin.blogs')->with('success', 'Blog post created successfully');
    }

    /**
     * Update a blog post.
     */
    public function updateBlog(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_alt' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'featured' => 'boolean',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image_alt' => $request->featured_image_alt,
            'status' => $request->status,
            'featured' => $request->boolean('featured', false),
            'tags' => $request->tags ? json_decode($request->tags, true) : [],
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ];

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blog->featured_image && Storage::disk('public')->exists(str_replace('storage/', '', $blog->featured_image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $blog->featured_image));
            }
            
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
            $data['featured_image'] = 'storage/' . $imagePath;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs')->with('success', 'Blog post updated successfully');
    }

    /**
     * Delete a blog post.
     */
    public function destroyBlog(Blog $blog)
    {
        // Delete featured image file
        if ($blog->featured_image && Storage::disk('public')->exists(str_replace('storage/', '', $blog->featured_image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $blog->featured_image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs')->with('success', 'Blog post deleted successfully');
    }

    /**
     * Display the projects management page.
     */
    public function projects()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function createProject()
    {
        return view('admin.projects.create');
    }

    /**
     * Show the form for editing a project.
     */
    public function editProject(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Store a new project.
     */
    public function storeProject(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'technology' => 'nullable|string|max:255',
            'scope_of_work' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        $data = $request->all();
        
        // Auto-generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create($data);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
    }

    /**
     * Update an existing project.
     */
    public function updateProject(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'technology' => 'nullable|string|max:255',
            'scope_of_work' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        $data = $request->all();
        
        // Auto-generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    /**
     * Delete a project.
     */
    public function destroyProject(Project $project)
    {
        try {
            // Delete image file
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $project->delete();

            return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.projects')->with('error', 'Error deleting project: ' . $e->getMessage());
        }
    }
}
