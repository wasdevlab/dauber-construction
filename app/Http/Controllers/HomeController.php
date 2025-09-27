<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use App\Models\Gallery;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Handle contact form submission
     */
    public function submitContactForm(ContactFormRequest $request)
    {
        try {
            // Get validated data
            $contactData = $request->validated();
            
            // Send email to company
            Mail::to('malik@bawkucrossroads.com')->send(new ContactFormMail($contactData));
            
            // Redirect back with success message
            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
            
        } catch (\Exception $e) {
            // Log the error
            Log::error('Contact form submission failed: ' . $e->getMessage());
            
            // Redirect back with error message
            return redirect()->back()->with('error', 'Sorry, there was an error sending your message. Please try again later.');
        }
    }

    /**
     * Display the gallery page
     */
    public function gallery()
    {
        $galleries = Gallery::orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();
        return view('gallery', compact('galleries'));
    }

    /**
     * Display the news and blogs page
     */
    public function newsAndBlogs(Request $request)
    {
        $query = Blog::with('author')->published()->orderBy('created_at', 'desc');
        
        // Filter by tag if provided
        if ($request->has('tag') && $request->tag) {
            $query->whereJsonContains('tags', $request->tag);
        }
        
        $blogs = $query->paginate(12);
        $featuredBlogs = Blog::with('author')->published()->featured()->orderBy('created_at', 'desc')->limit(3)->get();
        
        return view('news-and-blogs', compact('blogs', 'featuredBlogs'));
    }

    /**
     * Display a single blog post
     */
    public function singlePost(Blog $blog)
    {
        // Ensure the blog is published
        if ($blog->status !== 'published') {
            abort(404);
        }
        
        // Load the author relationship
        $blog->load('author');
        
        // Get featured blogs for sidebar with author
        $featuredBlogs = Blog::with('author')->published()->featured()->where('id', '!=', $blog->id)->orderBy('created_at', 'desc')->limit(3)->get();
        
        // Get latest posts for bottom section with author
        $latestPosts = Blog::with('author')->published()->where('id', '!=', $blog->id)->orderBy('created_at', 'desc')->limit(3)->get();
        
        // Get previous and next posts
        $previousPost = Blog::published()->where('created_at', '<', $blog->created_at)->orderBy('created_at', 'desc')->first();
        $nextPost = Blog::published()->where('created_at', '>', $blog->created_at)->orderBy('created_at', 'asc')->first();
        
        // Get all unique tags from all published blogs
        $allPublishedBlogs = Blog::published()->whereNotNull('tags')->get(['tags']);
        $allTags = collect();
        $allPublishedBlogs->each(function($post) use ($allTags) {
            if ($post->tags && is_array($post->tags)) {
                $allTags->push(...$post->tags);
            }
        });
        $uniqueTags = $allTags->unique()->values()->take(15);
        
        return view('single-post', compact('blog', 'featuredBlogs', 'latestPosts', 'previousPost', 'nextPost', 'uniqueTags'));
    }
}
