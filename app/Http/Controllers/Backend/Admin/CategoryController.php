<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use App\Services\FileUploader;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug = '')
    {
        $page_data['list_type'] = Type::get();
        $page_data['slug']      = $slug;
        return view('admin::category.index', $page_data);
    }

    public function store(Request $request)
    {
        request()->merge(['slug' => slugify($request->title)]);

        $validation = $request->validate([
            'title'     => 'required|string|max:100',
            'slug'      => 'required|string|max:100|unique:categories,slug',
            'parent_id' => 'nullable',
            'type_id'   => 'nullable',
            'icon'      => 'nullable|string|max:100',
            'image'     => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'category');
        }

        Category::create($validation);

        return goBack('success', 'Category created successfully');
    }

    public function update(Request $request, $slug)
    {
        request()->merge(['slug' => slugify($request->title)]);

        $category = Category::firstWhere('slug', $slug);

        $validation = $request->validate([
            'title'   => 'required|string|max:100',
            'slug'    => 'required|string|max:100|unique:categories,slug,' . $category->id,
            'type_id' => 'nullable',
            'icon'    => 'nullable|string|max:100',
            'image'   => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'category');
        }

        $category->update($validation);

        return goBack('success', 'Category updated successfully!');
    }

    public function delete($slug)
    {
        $category = Category::firstWhere('slug', $slug);
        $category->delete();

        return goBack('success', 'Category deleted successfully!');
    }
}
