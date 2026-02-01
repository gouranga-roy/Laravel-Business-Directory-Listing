@php
    use App\Models\Category;

    $categories = Category::where('id', $category_id)->where('parent_id', 0)->first();

@endphp

<form action="{{ route('category.subStore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type_id" value="{{ $categories->type_id }}">
    <input type="hidden" name="category_id" value="{{ $categories->id }}">

    <x-input type="text" label="{{ translate('Name') }}" name="title" required />
    <x-input-icon type="text" label="{{ translate('Pick Your Icon') }}" name="icon" id="icon-picker" icon="fa fa-pencil" class="icon-picker" />

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
