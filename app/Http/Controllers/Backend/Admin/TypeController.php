<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Services\FileUploader;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Type View
    public function index()
    {
        $page_data['list_type'] = Type::latest()->get();

        return view('admin::custom-type.index', $page_data);
    }

    // Type Store
    public function store(Request $request)
    {
        request()->merge(['slug' => slugify($request->name)]);
        $validation = $request->validate([
            'name'   => 'required|string|max:100',
            'slug'   => 'required|string|max:100|unique:types,slug',
            'logo'   => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'image'  => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validation['logo'] = FileUploader::upload($request->file('logo'), 'type');
        }

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'type');
        }

        Type::create($validation);

        return goBack('success', 'Type created successfully');

    }

    // Type Update
    public function update(Request $request, $slug)
    {
        request()->merge(['slug' => slugify($request->name)]);

        $listType = Type::firstWhere('slug', $slug);

        $validation = $request->validate([
            'name'   => 'required|string|max:100',
            'slug'   => 'required|string|max:100|unique:types,slug,' . $listType->id,
            'logo'   => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'image'  => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validation['logo'] = FileUploader::upload($request->file('logo'), 'type');
        }
        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'type');
        }

        $listType->update($validation);
        return goBack('success', 'Data Update successfully');
    }

    // Delete Data
    public function delete($slug)
    {
        $listType = Type::firstWhere('slug', $slug);
        $listType->delete();

        return goBack('success', 'Type deleted successfully.');
    }
}
