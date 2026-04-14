@extends('layouts::backend')
@push('title', 'Directory Create')

@php
    $cateSlug = $directoryList->category->slug;

    $list_id = $directoryList->id;

@endphp

@section('content')
    <div class="directoryList-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Edit Listing') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <a href="{{ route('directoryList') }}" class="btn btn-sm btn-dark">{{ translate('Back Listing') }}</a>
            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <form action="{{ route('directoryList.update') }}" method="post" enctype="multipart/form-data" class="mb-20">
                    @csrf
                    @method('PUT')

                    <input type="text" name="list_id" value="{{ $list_id }}" hidden>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input type="text" name="list_type" value="{{ $directoryList->type->name }}" label="List Type" readonly></x-input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="category_id" class="form-label required">
                                    {{ translate('Select List Categories') }}
                                </label>

                                <x-select name="category_id" placeholder="{{ translate('Categories.') }}">
                                    <option value=""></option>
                                    @foreach ($floatOptions as $option)
                                        <option value="{{ $option['value'] }}" {{ $option['slug'] == $cateSlug ? 'selected' : '' }}>{{ $option['label'] }}</option>
                                    @endforeach
                                </x-select>

                            </div>
                        </div>
                    </div>

                    <div class="rounded-10 bg-light p-3">


                        <div class="text-end mb-20">
                            <button type="submit" class="btn btn-dark">{{ translate('Update') }}</button>
                        </div>

                        <ul class="nav nav-tabs mb-20" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{ translate('Basic Info') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">{{ translate('Address') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">{{ translate('Seo') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">{{ translate('Contact') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media-tab-pane" type="button" role="tab" aria-controls="media-tab-pane" aria-selected="false">{{ translate('Media') }}</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                                <div class="mb-2">
                                    <x-input type="text" name="title" label="{{ translate('Listing Title *') }}" value="{{ $directoryList->title }}" />
                                </div>

                                {{-- Custom Field --}}
                                <div class="field-content"></div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="visibility" class="form-label required ">
                                                {{ translate('Visibility *') }}
                                            </label>
                                            <x-select name="status" class="select2" placeholder="{{ translate('Select visibility') }}">
                                                <option value=""></option>
                                                <option value="1" selected>{{ translate('Visible') }}</option>
                                                <option value="0">{{ translate('Hidden') }}</option>
                                            </x-select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="type" class="form-label required ">
                                                {{ translate('Type *') }}
                                            </label>
                                            <x-select name="content_type" class="select2" placeholder="{{ translate('Select Type') }}">
                                                <option value=""></option>
                                                <option value="top" {{ $directoryList->content_type == 'top' ? 'selected' : '' }}>{{ translate('Top') }}</option>
                                                <option value="feature" {{ $directoryList->content_type == 'feature' ? 'selected' : '' }}>{{ translate('Feature') }}</option>
                                            </x-select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-20">
                                    <label for="description" class="form-label">{{ translate('Description *') }}</label>
                                    <textarea name="description" class="text_editor" id="description" placeholder="{{ translate('Hare ...') }}">{{ $directoryList->description }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <x-input type="text" name="latitude" label="{{ translate('Latitude') }}" value="{{ $directoryList->latitude }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <x-input type="text" name="longitude" label="{{ translate('Longitude') }}" value="{{ $directoryList->longitude }}" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="address-tab-pane" role="tabpanel" aria-labelledby="address-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">

                                            <label for="type" class="form-label  required ">
                                                {{ translate('Country *') }}
                                            </label>

                                            <x-select name="country_id" class="select2" placeholder="{{ translate('Select listing country') }}">
                                                <option value=""></option>

                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $country->name == $directoryList->country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">

                                            <label for="type" class="form-label  required ">
                                                {{ translate('City *') }}
                                            </label>

                                            <x-select name="citySelect" class="select2 w-100" placeholder="{{ translate('Select listing city') }}">
                                                <option value=""></option>
                                            </x-select>

                                        </div>
                                    </div>
                                </div>
                                <x-textarea name="address" label="Address *" placeholder="Enter listing address" row="4" value="{{ $directoryList->address }}"></x-textarea>
                                <x-input type="text" name="postal_code" label="Post code *" placeholder="Enter post code" {{ $directoryList->postal_code }} />
                            </div>

                            <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
                                <x-input type="text" name="meta_title" label="Meta Title" placeholder="Enter meta title" value="Meta title" />

                                <div class="mb-3">
                                    <label for="multi_value_option" class="form-label"> {{ translate('Meta keywords') }}</label>
                                    <input type="text" class="multiTagChoice" name="keywords[]" data-placeholder="{{ translate('Type and press enter') }}" value="Meta keywords">
                                </div>

                                <x-textarea name="meta_description" label="Meta Description" row="" placeholder="{{ translate('Enter meta description') }}">Meta description</x-textarea>
                                <x-input type="text" name="og_title" label="OG Title" placeholder="{{ translate('Enter og title') }}" value="Og title" />
                                <x-textarea name="og_description" label="Og Description" row="4" placeholder="{{ translate('Enter og description') }}">Og description</x-textarea>
                                <div class="mb-3">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" id="thumbnail" name="sco_image" accept="image/*" hidden data-preview="#preview-product-thumbnail">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="image-upload-area">
                                                <img src="{{ getImage() }}" id="preview-product-thumbnail" alt="product-thumbnail">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <x-input type="text" name="agent_name" label="Name" placeholder="Enter name" value="{{ $directoryList->agent_name ?? '' }}" />
                                <x-input type="email" name="agent_email" label="Email" placeholder="Enter email" value="{{ $directoryList->agent_email ?? '' }}" />
                                <x-input type="number" name="agent_phone" label="Phone number" placeholder="Enter phone number" value="{{ $directoryList->agent_phone ?? '' }}" />
                            </div>

                            <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">

                                            <label class="form-label">List Thumbnail: </label>
                                            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" hidden data-preview="#preview-listing-thumbnail">

                                            <div class="row justify-content-center">
                                                <div class="image-upload-area mb-10">
                                                    <img src="{{ getImage($directoryList->thumbnail) }}" id="preview-listing-thumbnail" alt="listing-thumbnail">
                                                </div>
                                                <p>{{ translate('Click to upload SVG, PNG, JPG, or GIF (max 500 x 700px)') }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="gallery" class="form-label">{{ translate('Featured Gallery') }}</label>
                                            <div class="form-group mb-20">
                                                <input type="file" class="form-control" name="gallery[]" id="gallery" accept="image/*" multiple>
                                            </div>
                                        </div>

                                        <div class="row row-cols-6 g-3" id="imageGallery"></div>


                                        <div class="row row-cols-6 g-3" id="imageGallery">

                                            @foreach ($directoryList->gallery as $gallery)
                                                <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3 col-xxl-2" data-index="0">

                                                    <div class="gallery-img">
                                                        <img src="{{ getImage($gallery->path) }}" />
                                                        <button type="button" class="remove-img remove-img-btn" data-id="{{ $gallery->id }}">
                                                            <i class="fi fi-rr-cross-small"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        @include('core::initJs')
                        @include('core::scripts')


                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', 'button.remove-img-btn[data-id]', function() {
                let $this = $(this);
                let id = $(this).data('id');

                if (!id) {
                    error("{{ translate('Image not found.') }}");
                    return;
                }

                let url = "{{ route('directoryList.gallery.delete', ':id') }}";
                url = url.replace(':id', id);

                ajaxPost(url, function() {
                    $this.parent().parent().fadeOut(300);

                    setTimeout(() => {
                        $this.remove();
                    }, 100);
                });
            });

        });
    </script>
@endpush
