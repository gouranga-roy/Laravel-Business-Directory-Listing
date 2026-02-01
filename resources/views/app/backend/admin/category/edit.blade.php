@php
    use App\Models\Category;
    $query = Category::where('slug', $slug)->where('parent_id', 0);
    $categories = $query->get();

@endphp

<form action="{{ route('category.update', $slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="type_id" value="{{ $query->first()->type_id }}">
    <x-input type="text" label="{{ translate('Name') }}" name="title" value="{{ $query->first()->title }}" class="mb-3" required />
    @if ($query->first()->parent_id == 0)
        <x-select class="mb-3" name="parent_id" label="{{ translate('Category Parent') }}">
            <option></option>
            <option value="0">No parent</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
    @endif

    <x-input-icon type="text" label="{{ translate('Pick Your Icon') }}" name="icon" value="{{ $query->first()->icon }}" id="icon-picker" icon="fa fa-pencil" class="icon-picker" />

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
