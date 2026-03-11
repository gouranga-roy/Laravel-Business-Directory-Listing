@php
    use App\Models\Type;
    use App\Models\CustomField;

    $listType = Type::get();

    $field_data = CustomField::where('id', $id)->first();

    $get_options = $field_data->options ?? [];

    $options = implode(',', $get_options);

@endphp

<form action="{{ route('customField.update', $id) }}" method="POST">
    @csrf

    <x-input type="text" name="label" label="Label field name *" value="{{ $field_data->label }}"></x-input>

    <x-select name="field" id="field_select" placeholder="{{ translate('Select Type.') }}" label="{{ translate('Field label type') }}">
        <option value=""></option>

        <option value="text" @selected($field_data->field == 'text')> {{ translate('Text') }}</option>
        <option value="email" @selected($field_data->field == 'email')> {{ translate('Email') }}</option>
        <option value="number" @selected($field_data->field == 'number')> {{ translate('Number') }}</option>
        <option value="textarea" @selected($field_data->field == 'textarea')> {{ translate('Textarea') }}</option>
        <option value="select" @selected($field_data->field == 'select')> {{ translate('Select') }}</option>
        <option value="checkbox" @selected($field_data->field == 'checkbox')> {{ translate('Checkbox') }}</option>
        <option value="radio" @selected($field_data->field == 'radio')> {{ translate('Radio') }}</option>
    </x-select>

    @if ($field_data->field == 'select' || $field_data->field == 'checkbox' || $field_data->field == 'radio')
        <div class="mb-3 multiple-field-type" id="edit-field-type">
            <label for="multi_value_option" class="form-label">{{ translate('Insert your options') }} </label>

            <input type="text" class="multiTagChoice" name="options[]" placeholder="{{ translate('Type and press enter') }}" value="{{ implode(',', $field_data->options) }}" />
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
