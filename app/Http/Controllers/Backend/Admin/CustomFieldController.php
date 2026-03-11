<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomField;
use Exception;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    public function index()
    {
        $page_data['fieldAll'] = CustomField::with('types')->get();

        return view('admin::custom-field.index', $page_data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'        => 'required|string|max:100',
            'field'        => 'required|string|max:100',
            'options'      => 'nullable|required_if:type,options,checkbox,radio|array|max:250',
            'options.*'    => 'required|string|max:250',
            'is_required'  => 'nullable|boolean',
            'status'       => 'nullable|boolean',
            'placeholder'  => 'nullable|string',
            'listing_type' => 'nullable|integer',
        ]);

        $validated['options'] = explode(',', implode('', $validated['options'] ?? []));

        CustomField::create($validated);

        return goBack('success', 'Custom field created successfully!');
    }

    public function update(Request $request, $id)
    {
        $customField = CustomField::firstWhere('id', $id);

        $validated = $request->validate([
            'label'        => 'required|string|max:100',
            'field'        => 'required|string|max:100',
            'options'      => 'nullable|required_if:type,options,checkbox,radio|array|max:250',
            'options.*'    => 'required|string|max:250',
            'is_required'  => 'nullable|boolean',
            'status'       => 'nullable|boolean',
            'placeholder'  => 'nullable|string',
            'listing_type' => 'nullable|integer',
        ]);

        $validated['is_required'] = $request->has('is_required') ? 1 : null;
        $validated['status']      = $request->has('status') ? 1 : null;

        $validated['options'] = explode(',', implode('', $validated['options'])) ?? [];

        $customField->update($validated);

        return goBack('success', 'Custom field updated successfully!');
    }

    public function delete($id)
    {
        $deleteField = CustomField::findOrFail($id);
        $deleteField->delete();

        return goBack('success', 'Field deleted successfully');
    }

    public function statusUpdate(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:custom_fields,id',
        ]);

        $customField = CustomField::findOrFail($request->field_id);

        $customField->update([
            'status' => ! $customField->status,
        ]);

        return response()->json([
            'status'  => true,
            'success' => 'Status update successfully',
        ]);

    }

}
