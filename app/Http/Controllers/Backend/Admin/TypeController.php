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
        $page_data = Type::get();

        return view('admin::custom-type.index', $page_data);
    }

    // Type Store
    public function store(Request $request)
    {
        // Filed Validation
        $validation = $request->validate([
            'name'   => 'required|string|max:100',
            'logo'   => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'image'  => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
            'status' => 'required|boolean',
        ]);

        // Upload Photo
        if ($request->hasFile('logo')) {
            $validation['logo'] = FileUploader::upload($request->file('logo'), 'type');
        }

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'type');
        }

        // Store Data
        Type::create([
            'name'   => $validation['name'],
            'logo'   => $validation['logo'],
            'image'  => $validation['image'],
            'status' => $validation['status'],
        ]);

        return redirect()->back()->with('success', 'Type created successfully');

    }
}
