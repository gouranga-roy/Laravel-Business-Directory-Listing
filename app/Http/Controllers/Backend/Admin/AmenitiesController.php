<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\ListingAmenity;
use App\Models\Type;
use App\Services\FileUploader;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function index()
    {
        $page_data['amenities_list'] = Amenities::orderBy('id', 'DESC')->paginate(10);

        return view('admin::amenities.index', $page_data);
    }

    public function store(Request $request)
    {
        request()->merge(['slug' => slugify($request->title)]);

        $validation = $request->validate([
            'title'     => 'required|string|max:100',
            'slug'      => 'required|string|max:100|unique:amenities,slug',
            'parent_id' => 'nullable|integer|min:0',
            'icon'      => 'nullable|string|max:100',
            'image'     => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
        ]);

        $validation['parent_id'] = $validation['parent_id'] ?? 0;

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'amenities');
        }

        Amenities::create($validation);

        return goBack('success', 'Amenities created successfully!');
    }

    public function update(Request $request, $slug)
    {
        request()->merge(['slug' => slugify($request->title)]);

        $amenities = Amenities::firstWhere('slug', $slug);

        $validation = $request->validate([
            'title'     => 'required|string|max:100',
            'slug'      => 'required|string|max:100|unique:amenities,slug,' . $amenities->id,
            'parent_id' => 'nullable|integer|min:0',
            'icon'      => 'nullable|string|max:100',
            'image'     => 'nullable|image|mimes:' . allowedFileExt() . '|max:1024',
        ]);

        $validation['parent_id'] = $validation['parent_id'] ?? 0;

        if ($request->hasFile('image')) {
            $validation['image'] = FileUploader::upload($request->file('image'), 'amenities');
        }

        $amenities->update($validation);

        return goBack('success', 'Amenities updated successfully!');
    }

    public function delete($slug)
    {
        $amenities = Amenities::firstWhere('slug', $slug);

        $amenities->delete();

        return goBack('success', 'Amenities delete successfully!');
    }

    // Listing Amenities
    public function listAmenities($slug = '')
    {
        $page_data['amenities_list'] = Amenities::orderBy('id', 'DESC')->paginate(10);

        $page_data['list_type'] = Type::get();
        $page_data['slug']      = $slug;

        return view('admin::listing-amenities.index', $page_data);
    }

    public function listAmenitiesStore(Request $request)
    {

        $request->validate([
            'type_id'     => 'required|integer',
            'amenities'   => 'required|array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        ListingAmenity::create([
            'type_id'      => $request->type_id,
            'amenities_id' => json_encode($request->amenities),
        ]);

        return goBack('success', 'Listing amenities create successfully!');

    }

    public function listAmenitiesUpdate(Request $request)
    {
        $request->validate([
            'type_id'     => 'required|integer',
            'amenities'   => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
        ]);

        $listingAmenity = ListingAmenity::where('type_id', $request->type_id)->first();

        // ListingAmenity::updateOrCreate(
        //     ['type_id', $request->type_id],
        //     [
        //         'type_id'      => $request->type_id,
        //         'amenities_id' => json_encode($request->amenities ?? []),
        //     ]
        // );

        if ($listingAmenity) {
            $listingAmenity->update([
                'amenities_id' => json_encode($request->amenities ?? []),
            ]);
        } else {
            ListingAmenity::create([
                'type_id'      => $request->type_id,
                'amenities_id' => json_encode($request->amenities ?? []),
            ]);
        }

        return back()->with('success', 'Listing amenities updated successfully!');
    }

    public function listAmenitiesDelete($slug)
    {
        dd($slug);
    }

}
