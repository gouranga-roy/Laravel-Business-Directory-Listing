<form action="{{ route('blogCategory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <x-input type="text" label="{{ translate('Name') }}" name="title" />

    <x-input-icon type="text" label="Pic Your Icon" name="icon" id="icon-picker" class="icon-picker" />

    <div class="mb-3">
        <label class="form-label">{{ translate('Thumbnail') }}</label>
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
