@php
    use App\Models\Category;

    $categories = Category::where('id', $category_id)->where('parent_id', 0)->first();

@endphp

<form action="{{ route('category.subStore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type_id" value="{{ $categories->type_id }}">
    <input type="hidden" name="category_id" value="{{ $categories->id }}">
    <x-input type="text" label="{{ translate('Name') }}" name="title" required />

    <x-input type="text" label="{{ translate('Pick Your Icon') }}" name="icon" id="icon-picker" class="icon-picker" />

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
</script>
