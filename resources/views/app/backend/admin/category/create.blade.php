@php
    use App\Models\Category;

    $categories = Category::where('type_id', $type_id)->where('parent_id', 0)->get();

@endphp

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type_id" value="{{ $type_id }}">
    <x-input type="text" label="{{ translate('Name') }}" name="title" required />

    @if ($categories->count() > 0)
        <x-select name="parent_id" label="{{ translate('Category Parent') }}">
            <option></option>
            <option value="0">No parent</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
    @endif

    <x-input-icon type="text" label="Pic Your Icon" name="icon" id="icon-picker" class="icon-picker" />

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
        <button type="submit" class="btn btn-dark rounded-6">{{ translate('Create') }}</button>
    </div>

</form>

@include('core::initJs')
@include('core::scripts')
