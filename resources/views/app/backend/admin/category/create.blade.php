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
            <option value="0" selected>Select Category...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select>
    @endif
    <x-input type="text" label="{{ translate('Pick Your Icon') }}" name="icon" id="icon-picker" class="icon-picker" />
    <x-input type="file" label="{{ translate('Image') }}" name="image" id="catImage" class="photo-upload-file" hidden />
    <div class="mb-3 catImgWrap">
        <label for="catImage" class="preview-label mt-1">
            <span>
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <small>Upload Media</small>
            </span>
            <img src="" id="previewImage" alt="">
        </label>
    </div>


    <button type="submit" class="btn btn-dark rounded-6">{{ translate('Create') }}</button>

</form>

@include('core::modal')


<script type="text/javascript">
    "Use strict";

    $(function() {
        if ($('.icon-picker').length) {
            $('.icon-picker').iconpicker();
        }
    });

    // Check Changes Parent
    $(document).on('change', '#parent_id', function() {
        let changeVal = $(this).val();

        if (changeVal != 0) {
            $(".catImgWrap").hide();
            $(".photo-upload-file").hide();
        } else {
            $(".catImgWrap").show();
            $(".photo-upload-file").show();
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
