@php
    use App\Models\Amenities;

    $amenities = Amenities::firstWhere('slug', $slug);

@endphp

<form action="{{ route('amenities.update', $slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-input type="text" name="title" label="{{ translate('Name') }}" value=" {{ $amenities->title }} " required />

    {{-- @if ($categories->count() > 0) --}}
    <x-select name="parent_id" label="{{ translate('Category Parent') }}">
        <option></option>
        <option value="0">No parent</option>
        {{-- @foreach ($categories as $category) --}}
        <option value="0">Item One</option>
        <option value="0">Item Two</option>
        {{-- @endforeach --}}
    </x-select>
    {{-- @endif --}}

    <x-input-icon type="text" label="Pic Your Icon" name="icon" id="icon-picker" class="icon-picker" value=" {{ $amenities->icon }} " />

    <div class="mb-3">

        <label class="form-label">Thumbnail</label>
        <input type="file" id="thumbnail" name="image" accept="image/*" hidden data-preview="#preview-product-thumbnail">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="image-upload-area">
                    <img src="{{ getImage() }}" id="preview-product-thumbnail" alt="product-thumbnail">
                </div>
            </div>
        </div>

    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-dark rounded-6">{{ translate('Update') }}</button>
    </div>

</form>


@include('core::initJs')
@include('core::scripts')
