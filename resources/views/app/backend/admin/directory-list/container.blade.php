@php
    use App\Models\Country;

    $countries = Country::get();

@endphp

<form action="">
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
                <x-input type="text" name="title" label="{{ translate('Listing Title *') }}" />
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-input type="number" label="{{ translate('Listing price *') }}" name="list-price" />
                </div>
                <div class="col-md-6">
                    <x-input type="number" label="{{ translate('Bed number *') }}" name="bed-number" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-input type="number" label="{{ translate('Bath number *') }}" name="bath-number" />
                </div>
                <div class="col-md-6">
                    <x-input type="number" label="{{ translate('Floor Size *') }}" name="floor-size" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="visibility" class="form-label required ">
                            {{ translate('Visibility *') }}
                        </label>
                        <x-select name="visibility" class="select2" placeholder="{{ translate('Select visibility') }}">
                            <option value=""></option>
                            <option value="visible">{{ translate('Visible') }}</option>
                            <option value="hidden">{{ translate('Hidden') }}</option>
                        </x-select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="type" class="form-label  required ">
                            {{ translate('Type *') }}
                        </label>
                        <x-select name="type" class="select2" placeholder="{{ translate('Select Type') }}">
                            <option value=""></option>
                            <option value="Top">{{ translate('Top') }}</option>
                            <option value="Feature">{{ translate('Feature') }}</option>
                        </x-select>
                    </div>
                </div>
            </div>

            <div class="mb-20">
                <label for="description" class="form-label">{{ translate('Description *') }}</label>
                <textarea name="description" class="text_editor" id="description" placeholder="{{ translate('Hare ...') }}"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-input type="text" name="latitude" label="{{ translate('Latitude') }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <x-input type="text" name="longitude" label="{{ translate('Longitude') }}" />
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

                        <x-select name="country" class="select2" placeholder="{{ translate('Select listing country') }}">
                            <option value=""></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
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
            <x-textarea name="address" label="Address *" placeholder="Enter listing address" row="4"></x-textarea>
            <x-input type="text" name="post-code" label="Post code *" placeholder="Enter post code" />
        </div>

        <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
            <x-input type="text" name="meta-title" label="Meta Title" placeholder="Enter meta title" />

            <select data-tags="true" class="chosen-select" data-placeholder="Select an option" data-allow-clear="true">
                <option value=""></option>
                <option value="">Item One</option>
                <option value="">Item Two</option>
                <option value="">Item Three</option>
            </select>

            <x-textarea name="meta-description" label="Meta Description" row="" placeholder="Enter meta description"></x-textarea>
            <x-input type="text" name="og-title" label="OG Title" placeholder="Enter og title" />
            <x-input type="text" name="canonical-url" label="Canonical Url" placeholder="Enter canonical url" />
            <x-textarea name="og-description" label="Og Description" row="4" placeholder="Enter og description"></x-textarea>
            <x-input type="text" name="json-id" label="Json ID" placeholder="Enter json ID"></x-input>
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <input type="file" id="thumbnail" name="sco-image" accept="image/*" hidden data-preview="#preview-product-thumbnail">

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
            <x-input type="text" name="name" label="Name" placeholder="Enter name" />
            <x-input type="email" name="email" label="Email" placeholder="Enter email" />
            <x-input type="number" name="number" label="Phone number" placeholder="Enter phone number" />
        </div>

        <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">
            <div class="mb-3">
                <label class="form-label">Listing Images: </label>
                <input type="file" id="thumbnail" name="media-image" accept="image/*" hidden data-preview="#preview-product-thumbnail">

                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <div class="image-upload-area mb-10">
                            <img src="{{ getImage() }}" id="preview-product-thumbnail" alt="product-thumbnail">
                        </div>
                        <p>Click to upload SVG, PNG, JPG, or GIF (max 500 x 700px)</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</form>


@include('core::initJs')
@include('core::scripts')
