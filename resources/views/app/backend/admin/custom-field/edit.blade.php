@php
    use App\Models\Type;
    use App\Models\CustomField;

    $listType = Type::get();

    $field_data = CustomField::where('id', $id)->first();

@endphp

<form action="{{ route('customField.update', $id) }}" method="POST">
    @csrf

    <x-input type="text" name="label" label="Label field name *" value="{{ $field_data->label }}"></x-input>

    <x-select name="field" id="field_select" placeholder="{{ translate('Select Type.') }}" label="{{ translate('Field label type') }}">
        <option value=""></option>
        <option value="text" {{ $field_data->field == 'text' ? 'selected' : '' }}> {{ translate('Text') }}</option>
        <option value="email" {{ $field_data->field == 'email' ? 'selected' : '' }}> {{ translate('Email') }}</option>
        <option value="number" {{ $field_data->field == 'number' ? 'selected' : '' }}> {{ translate('Number') }}</option>
        <option value="textarea" {{ $field_data->field == 'textarea' ? 'selected' : '' }}> {{ translate('Textarea') }}</option>
        <option value="select" {{ $field_data->field == 'select' ? 'selected' : '' }}> {{ translate('Select') }}</option>
        <option value="checkbox" {{ $field_data->field == 'checkbox' ? 'selected' : '' }}> {{ translate('Checkbox') }}</option>
        <option value="radio" {{ $field_data->field == 'radio' ? 'selected' : '' }}> {{ translate('Radio') }}</option>
    </x-select>

    @if ($field_data->field == 'select' || $field_data->field == 'checkbox' || $field_data->field == 'radio')
        <div class="mb-3 multiple-field-type">
            <label for="multi_value_type" class="form-label">Insert your options </label>
            <input type="text" class="multiTagChoice" name="multi_value_type[]" placeholder="Type and press enter" value="{{ $field_data->multi_value_type[0] }}" />
        </div>
    @endif

    <div class="mb-2 d-flex align-items-center gap-2 mb-16">
        <div class="form-switch dtable-switch p-0">
            <input class="form-check-input" type="checkbox" name="is_required" value="1" {{ $field_data->is_required == 1 ? 'checked' : '' }} role="switch" id="required-field" />
        </div>
        <label for="required-field">{{ translate('Required field') }}</label>
    </div>


    <div class="mb-3 d-flex align-items-center gap-2">
        <div class="form-switch dtable-switch p-0">
            <input class="form-check-input" type="checkbox" name="status" value="1" role="switch" id="status" {{ $field_data->status == 1 ? 'checked' : '' }} />
        </div>
        <label for="status">{{ translate('Status') }}</label>
    </div>

    <x-input type="text" name="placeholder" label="Placeholder" value="{{ $field_data->placeholder }}"></x-input>

    <x-select name="listing_type" placeholder="{{ translate('Select listing type.') }}" label="{{ translate('View On *') }}">
        <option value=""></option>
        @foreach ($listType as $type)
            <option value="{{ $type->id }}" {{ $field_data->listing_type == $type->id ? 'selected' : '' }}> {{ $type->name }}</option>
        @endforeach
    </x-select>
    <div class="text-end">
        <button class="btn btn-dark rounded-6" type="submit">Update</button>
    </div>


</form>


@include('core::initJs')
