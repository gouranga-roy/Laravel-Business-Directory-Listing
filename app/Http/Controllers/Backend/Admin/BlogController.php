<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Services\FileUploader;
use Illuminate\Http\Request;
use Response;

class BlogController extends Controller
{
    public function index()
    {

        $page_data['blogs'] = Blog::with('categories')->latest()->paginate(10);

        return view('admin::blogs.index', $page_data);

    }

    public function create()
    {
        $page_data['categories'] = BlogCategory::get();

        return view('admin::blogs.create', $page_data);
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => slugify($request->title)]);

        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:blogs,slug',
            'category_id'     => 'required|integer|exists:blog_categories,id',
            'description'     => 'required|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'keywords'        => 'nullable|array',
            'keywords.*'      => 'string|max:255',
            'popular'         => 'nullable|boolean',
            'is_published'    => 'nullable|boolean',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = FileUploader::upload($request->file('image'), "blog/image");
        }

        Blog::create($validated);

        return goBack('success', 'Blog created successfully!');

    }

    public function edit($slug)
    {
        $page_data['blog'] = Blog::where('slug', $slug)->with('categories')->firstOrFail();

        $page_data['categories'] = BlogCategory::get();

        return view('admin::blogs.edit', $page_data);
    }

    public function update(Request $request)
    {

        $blog = Blog::findOrFail($request->blog_id);

        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'category_id'     => 'required|integer|exists:blog_categories,id',
            'description'     => 'required|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'keywords'        => 'nullable|array',
            'keywords.*'      => 'string|max:255',
            'popular'         => 'nullable|boolean',
            'is_published'    => 'nullable|boolean',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        $validated['slug'] = $request->merge(['slug' => slugify($request->title)]);

        if ($request->hasFile('image')) {
            $validated['image'] = FileUploader::upload($request->file('image'), "blog/image");
        }

        $blog->update($validated);

        return goBack('success', 'Blog update successfully!');

    }

    public function delete($id)
    {
        $blogDelete = Blog::findOrFail($id);

        $blogDelete->delete();

        return goBack('success', 'Blog deleted successfully1');
    }

}
