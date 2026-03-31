<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\CustomField;
use App\Models\CustomFieldValue;
use App\Models\DirectoryList;
use App\Models\DirectoryListGallery;
use App\Models\Type;
use App\Services\FileUploader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryListController extends Controller
{
    public function index()
    {
        $page_data['list_type'] = Type::get();
        $page_data['lists']     = DirectoryList::with(['category', 'custom'])
            ->whereHas('type', function ($q) {
                $q->where('types.slug', request()->route()->parameter('slug'));
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin::directory-list.index', $page_data);
    }

    public function create()
    {
        $page_data['list_type'] = Type::get();

        return view('admin::directory-list.create', $page_data);
    }

    public function searchCategory(Request $request)
    {
        $typeId = $request->type_id;

        // Get custom field
        $fieldGet = CustomField::where('listing_type', $typeId)->where('status', 1)->get();

        if ($typeId) {
            $contentForm = view('admin::directory-list.container')->render();

            $customField = view('admin::directory-list.field', [
                'fieldGet' => $fieldGet,
            ])->render();
        }

        $floatOptions = [];

        $categories = Category::where('type_id', $typeId)->where('parent_id', '0')->with('children.children')->get();

        foreach ($categories as $key => $parent) {

            $floatOptions[] = ['value' => $parent->id, 'label' => $parent->title];

            foreach ($parent->children as $key => $child) {
                $floatOptions[] = ['value' => $child->id, 'label' => '—— ' . $child->title];
            }

        }

        return response()->json([
            'success'     => true,
            'categories'  => $floatOptions,
            'contentForm' => $contentForm,
            'customField' => $customField,
        ]);
    }

    public function searchCities(Request $request)
    {
        $countryId = $request->country_id;

        $cities = City::where('country_id', $countryId)->get();

        return response()->json([
            'success' => true,
            'cities'  => $cities,
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(['slug' => slugify($request->title)]);

        // dd($request->all());

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255',
            'status'           => 'required|boolean',
            'content_type'     => 'required|string|in:top,feature',
            'listing_id'       => 'required|string',
            'category_id'      => 'required|string',
            'description'      => 'required|string',

            'latitude'         => 'required|numeric',
            'longitude'        => 'required|numeric',

            'country_id'       => 'required|integer|exists:countries,id',
            'address'          => 'required|string|max:255',
            'postal_code'      => 'nullable|string|max:255',

            'meta_title'       => 'required|string|max:255',
            'keywords'         => 'nullable|array|max:255',
            'meta_description' => 'required|string',
            'og_title'         => 'required|string',
            'og_description'   => 'required|string',
            'sco_image'        => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',

            'agent_name'       => 'required|string|max:255',
            'agent_email'      => 'required|email|max:255',
            'agent_phone'      => 'required|string|max:20',
            'thumbnail'        => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery'          => 'required|array',
            'gallery*'         => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = FileUploader::upload($request->file('thumbnail'), "listing/thumbnail");
        }

        $customFields = $request->custom_fields;

        try {
            DB::transaction(function () use ($validated, $customFields) {
                $post = DirectoryList::create($validated);

                CustomFieldValue::create([
                    'reference_type' => 'App\\Models\\DirectoryList',
                    'reference_id'   => $post->id,
                    'data'           => $customFields,
                ]);

                $gallery = [];
                foreach ($validated['gallery'] as $file) {
                    if (is_file($file)) {
                        $gallery[] = [
                            'path' => FileUploader::upload($file, "listing/gallery"),
                        ];
                    }
                }

                $post->gallery()->createMany($gallery);
            });
            return redirect()->back()->with('success', translate('Directory listing created successfully'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', translate('Something went wrong'));
        }

    }

    public function edit($slug)
    {

        $page_data['directoryList'] = DirectoryList::where('slug', $slug)->with(['category', 'type'])->first();
        $page_data['categories']    = Category::get();

        return view('admin::directory-list.edit', $page_data);

    }
}
