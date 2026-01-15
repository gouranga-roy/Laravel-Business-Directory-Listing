@php
    $type = App\Models\Type::findOrFail($id);
@endphp
<form action="{{ route('type.update', $type->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input type="text" label="{{ translate('Name') }}" name="name" class="mb-3" data-value="{{ $type->name }}" required />
    <x-input type="file" label="{{ translate('Logo') }}" name="logo" />
    <img class="size-80" src="{{ getImage($type->logo) }}" alt="">
    <x-input type="file" label="{{ translate('Image') }}" name="image" />
    <img class="size-80" src="{{ getImage($type->image) }}" alt="">
    <x-select class="mb-3" name="status" label="{{ translate('Status') }}" required>
        <option value="1" {{ $type->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $type->status == 0 ? 'selected' : '' }}>Inactive</option>
    </x-select>

    <button type="submit" class="btn btn-dark rounded-6">{{ translate('Update') }}</button>

</form>

@include('core::modal')
