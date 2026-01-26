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
    @if ($query->first()->parent_id != 0)
        <x-select class="mb-3" name="parent_id" label="{{ translate('Category Parent') }}">
            <option value="0" selected>Select Category...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
    @endif
    <x-input type="text" label="{{ translate('Pick Your Icon') }}" name="icon" value="{{ $query->first()->icon }}" id="icon-picker" class="icon-picker" />


    <x-input type="file" label="{{ translate('Image') }}" name="image" id="catImage" class="photo-upload-file" hidden />
    <div class="mb-3">
        <label for="catImage" class="preview-label mt-1">
            <span>
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <small>Upload Media</small>
            </span>
            <img src="" id="previewImage" alt="">
        </label>
    </div>


    <button type="submit" class="btn btn-dark rounded-6">{{ translate('Update') }}</button>

</form>

@include('core::modal')


<script type="text/javascript">
    "Use strict";

    $(function() {
        if ($('.icon-picker').length) {
            $('.icon-picker').iconpicker();
        }
    });

    // File upload and preview
    const input = document.getElementById('catImage');
    const preview = document.getElementById('previewImage');
    const previewLabel = document.querySelector('.preview-label > span');

    input.addEventListener('change', () => {
        const file = input.files[0];
        if (!file) return;

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        previewLabel.style.opacity = '0';

        preview.onload = () => URL.revokeObjectURL(preview.src);
    });
</script>
