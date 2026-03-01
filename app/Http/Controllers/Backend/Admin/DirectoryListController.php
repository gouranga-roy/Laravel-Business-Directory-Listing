<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\CustomField;
use App\Models\Type;
use Illuminate\Http\Request;

class DirectoryListController extends Controller
{
    public function index()
    {
        $page_data['list_type'] = Type::get();
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
        $fieldGet = CustomField::where('listing_type', $typeId)->get();

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

}
