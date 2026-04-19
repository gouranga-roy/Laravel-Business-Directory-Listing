@extends('layouts::backend')

@push('title', 'User Profile')


@section('content')
    <div class="bg-light px-20 py-10 rounded-10 mb-20">
        <h4 class="fs-20 text-secondary mb-0"><i class="fi fi-rr-admin-alt"></i> {{ translate('Profile Settings') }}</h4>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xl-9 col-lg-9">

                <div class="card mb-20">

                    <div class="card-header bg-white border-color mb-6">
                        <h6 class="d-flex align-items-center gap-2 color-dark heading-color"><i class="fi fi-rs-user-trust"></i> {{ translate('My Profile') }} </h6>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="name" label="{{ translate('Name') }}" placeholder="{{ translate('Enter name') }}" value="{{ $profile->name }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="email" name="email" label="{{ translate('Email') }}" placeholder="{{ translate('Enter email') }}" value="{{ $profile->email }}" readonly />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="phone" label="{{ translate('Phone') }}" placeholder="{{ translate('Enter phone') }}" value="{{ $profile->phone }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="city" label="{{ translate('City') }}" placeholder="{{ translate('Enter City') }}" value="{{ $profile->city }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="zip_code" label="{{ translate('Zip code') }}" placeholder="{{ translate('Enter code') }}" value="{{ $profile->zip }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="direction" label="{{ translate('Direction') }}" placeholder="{{ translate('Enter direction') }}" value="{{ $profile->direction }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="url" name="website" label="{{ translate('Website') }}" placeholder="{{ translate('Enter website') }}" value="{{ $profile->website }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="text" name="address" label="{{ translate('Address') }}" placeholder="{{ translate('Enter address') }}" value="{{ $profile->address }}" />
                            </div>

                            <div class="col-12">
                                <x-textarea type="text" name="about_notes" label="{{ translate('About Notes') }}" placeholder="{{ translate('Describe your self') }}" value="{{ $profile->notes }}" rows="6" />
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card">

                    <div class="card-header bg-white border-color mb-6">
                        <h6 class="d-flex align-items-center gap-2 color-dark heading-color"><i class="fi fi-rr-users"></i> {{ translate('My Socials Links') }} </h6>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="url" name="facebook" label="{{ translate('Facebook') }}" placeholder="{{ translate('Enter link') }}" icon="fa-brands fa-facebook-f" value="{{ $profile->facebook }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="url" name="twitter" label="{{ translate('Twitter') }}" placeholder="{{ translate('Enter link') }}" icon="fa-brands fa-twitter" value="{{ $profile->twitter }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="url" name="instagram" label="{{ translate('Instagram') }}" placeholder="{{ translate('Enter link') }}" icon="fa-brands fa-instagram" value="{{ $profile->instagram }}" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <x-input type="url" name="linkedin" label="{{ translate('Linkedin') }}" placeholder="{{ translate('Enter link') }}" icon="fa-brands fa-linkedin-in" value="{{ $profile->linkedin }}" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-dark">{{ translate('Save Changes') }}</button>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-lg-3">
                <div class="card">
                    <div class="card-body">

                        <div class="profile-photoWrap">
                            <div class="photoArea">
                                <img class="img-fluid rounded" id="portfolio_preview" src="https://placehold.co/600x400?text=Profile Photo" alt="">
                            </div>
                            <label for="profilePhoto" class="btn btn-dark w-100 d-flex align-items-center justify-content-center gap-2 fs-14"><i class="fi fi-sr-upload"></i> {{ translate('Upload Photo') }}</label>
                            <input type="file" id="profilePhoto" name="portfolio_photo" hidden>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection

@push('js')

    <script>
        'use strict';

        const profilePreview = document.querySelector('#portfolio_preview');
        const profilePhoto = document.querySelector('#profilePhoto');

        profilePhoto.addEventListener('change', function() {

            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    profilePreview.src = this.result;
                });

                reader.readAsDataURL(file);
            }

        });
    </script>
@endpush
