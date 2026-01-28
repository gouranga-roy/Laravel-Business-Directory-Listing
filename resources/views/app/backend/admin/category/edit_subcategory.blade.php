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
    <x-input type="text" label="{{ translate('Pick Your Icon') }}" name="icon" id="icon-picker" class="icon-picker" value="{{ $categories->icon }}" />

    <button type="submit" class="btn btn-dark rounded-6">{{ translate('Update') }}</button>
</form>

<script type="text/javascript">
    "Use strict";

    $(function() {
        if ($('.icon-picker').length) {
            $('.icon-picker').iconpicker();
        }
    });
</script>
