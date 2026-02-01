@php
    use App\Models\Category;
    $categories = Category::where('slug', $slug)->where('parent_id', $parent_id)->first();
@endphp

<form action="{{ route('category.subUpdate', $slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="type_id" value="{{ $categories->type_id }}">
    <input type="hidden" name="category_id" value="{{ $categories->id }}">

    <x-input type="text" label="{{ translate('Name') }}" name="title" value="{{ $categories->title }}" required />
    <x-input-icon type="text" label="{{ translate('Pick Your Icon') }}" name="icon" id="icon-picker" class="icon-picker" value="{{ $categories->icon }}" />


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
