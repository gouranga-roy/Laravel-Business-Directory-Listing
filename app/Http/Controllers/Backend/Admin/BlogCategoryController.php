<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Services\FileUploader;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $page_data['categories'] = BlogCategory::latest('id')->paginate(10);

        return view('admin::blogs.categories.index', $page_data);
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => slugify($request->title)]);

        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'slug'   => 'required|string|max:255|unique:blog_categories,slug',
            'icon'   => 'nullable|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = FileUploader::upload($request->file('image'), "blog/category");
        }

        BlogCategory::insert($validated);

        return goBack('success', 'Blog category created successfully!');

    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'icon'   => 'nullable|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $category = BlogCategory::findOrFail($request->id);

        if (! $category) {
            return goBack('error', 'Category not found!');
        }

        $newSlug = slugify($request->title);

        $validated['slug'] = $newSlug;

        if ($request->hasFile('image')) {
            $validated['image'] = FileUploader::upload($request->file('image'), "blog/category");
        }

        $category->update($validated);

        return goBack('success', 'Category updated successfully!');

    }

    public function delete($id)
    {
        $delete = BlogCategory::findOrFail($id);

        $delete->delete();

        return goBack('success', 'Category deleted successfully!');
    }

}
