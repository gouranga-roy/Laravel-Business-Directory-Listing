@extends('layouts::backend')
@push('title', 'Blog create')

@section('content')
    <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
        <div class="col-lg-6 col-md-6">
            <h4 class="fs-20 text-secondary mb-0">Blog Create</h4>
        </div>

        <div class="col-lg-6 col-md-6 text-end">
            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-dark">{{ translate('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-input type="text" label="{{ translate('Title*') }}" name="title" value="{{ old('title') }}" />

        <x-select name="category_id" label="{{ translate('Select Category*') }}" placeholder="{{ translate('Select category') }}">
            <option></option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach

        </x-select>

        <div class="mb-20">
            <label for="description" class="form-label">{{ translate('Description*') }}</label>
            <textarea name="description" class="text_editor" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ translate('Thumbnail') }}</label>
            <input type="file" id="thumbnail" name="image" accept="image" hidden data-preview="#preview-product-thumbnail">

            <div class="row">
                <div class="col-md-3">
                    <div class="image-upload-area">
                        <img src="{{ getImage() }}" id="preview-product-thumbnail" alt="product-thumbnail">
                    </div>
                </div>
            </div>
        </div>

        <x-tag name="keywords[]" label="{{ translate('Tag') }}" placeholder="{{ translate('Type and press enter') }}" />

        <x-toggle name="popular" label="{{ translate('Make is a popular') }}" value="1" />

        <x-toggle name="is_published" label="{{ translate('Visibility Status') }}" value="1" />

        <x-input type="text" label="{{ translate('SEO Title') }}" name="seo_title" value="{{ old('seo_title') }}" />

        <x-textarea type="text" label="{{ translate('SEO Description') }}" name="seo_description" value="{{ old('seo_description') }}" />

        <div class="text-end">
            <button type="submit" class="btn btn-dark rounded-6">{{ translate('Create') }}</button>
        </div>

    </form>
@endsection
