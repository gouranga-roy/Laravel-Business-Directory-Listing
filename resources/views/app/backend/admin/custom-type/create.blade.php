<form action="{{ route('type.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-input type="text" label="{{ translate('Name') }}" name="name" class="mb-3" required />
    <x-input type="file" label="{{ translate('Logo') }}" name="logo" />
    <x-input type="file" label="{{ translate('Image') }}" name="image" />
    <x-select class="mb-3" name="status" label="{{ translate('Status') }}" required>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </x-select>

    <button type="submit" class="btn btn-dark rounded-6">{{ translate('Create') }}</button>
</form>

@include('core::modal')
