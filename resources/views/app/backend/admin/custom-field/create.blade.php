@php
    use App\Models\Type;

    $listType = Type::get();

@endphp

<form action="{{ route('customField.store') }}" method="POST">
    @csrf

    <x-input type="text" name="label" label="Label field name *"></x-input>

    <x-select name="field" id="field_select" placeholder="{{ translate('Select Type.') }}" label="{{ translate('Field label type *') }}">
        <option value=""></option>
        <option value="text"> {{ translate('Text') }}</option>
        <option value="email"> {{ translate('Email') }}</option>
        <option value="number"> {{ translate('Number') }}</option>
        <option value="textarea"> {{ translate('Textarea') }}</option>
        <option value="select"> {{ translate('Select') }}</option>
        <option value="checkbox"> {{ translate('Checkbox') }}</option>
        <option value="radio"> {{ translate('Radio') }}</option>
    </x-select>

    <div class="mb-3 multiple-field-type" hidden="hidden">
        <label for="multi_value_type" class="form-label">Insert your options </label>
        <input type="text" class="multiTagChoice" name="multi_value_type[]" placeholder="Type and press enter">

        {{-- <textarea name="multi_value_type" class="form-control" id="multi_value_type" placeholder="Example: Small, Medium, Large"></textarea> --}}
    </div>

    <div class="mb-2 d-flex align-items-center gap-2 mb-16">
        <div class="form-switch dtable-switch p-0">
            <input class="form-check-input" type="checkbox" name="is_required" value="1" role="switch" id="required-field" />
        </div>
        <label for="required-field">{{ translate('Required field') }}</label>
    </div>


    <div class="mb-3 d-flex align-items-center gap-2">
        <div class="form-switch dtable-switch p-0">
            <input class="form-check-input" type="checkbox" name="status" value="1" role="switch" id="status" checked />
        </div>
        <label for="status">{{ translate('Status') }}</label>
    </div>

    <x-input type="text" name="placeholder" label="Placeholder"></x-input>

    <x-select name="listing_type" placeholder="{{ translate('Select listing type.') }}" label="{{ translate('View On *') }}">
        <option value=""></option>
        @foreach ($listType as $type)
            <option value="{{ $type->id }}"> {{ $type->name }}</option>
        @endforeach
    </x-select>
    <div class="text-end">
        <button class="btn btn-dark rounded-6" type="submit">Create</button>
    </div>


</form>


@include('core::initJs')
