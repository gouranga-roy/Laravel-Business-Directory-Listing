@php
    use App\Models\BlogCategory;

    $category = BlogCategory::firstWhere('id', $id);

@endphp

<form action="{{ route('blogCategory.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="id" value="{{ $id }}" hidden>

    <x-input type="text" label="{{ translate('Name') }}" name="title" value="{{ $category->title }}" />

    <x-input-icon type="text" label="Pic Your Icon" name="icon" id="icon-picker" class="icon-picker" value="{{ $category->icon }}" />

    <div class="mb-3">
        <label class="form-label">{{ translate('Thumbnail') }}</label>
        <input type="file" id="thumbnail" name="image" accept="image/*" hidden data-preview="#preview-product-thumbnail">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="image-upload-area">
                    <img src="{{ getImage($category->image) }}" id="preview-product-thumbnail" alt="product-thumbnail">
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
