@extends('layouts::backend')
@push('title', 'Dashboard')

@section('content')
    <div class="categories-wrapper">

        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('All Amenities') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <x-btn-modal :title="translate('Amenities Create')" :url="path(['admin::amenities.create'])" />
            </div>
        </div>

        <div class="amenitiesGrid-wrapper">
            <div class="row">
                @forelse ($amenities_list as $amenities)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="amenities-card">
                            <div class="d-flex align-items-start justify-content-between">
                                <figure>
                                    <img src="{{ getImage($amenities->image) }}" alt="{{ translate('') }}">
                                </figure>
                                <x-dropdown class="actionBtn">
                                    <x-drop-modal :title="translate('Edit')" :url="path(['admin::amenities.edit', 'slug' => $amenities->slug])" />
                                    <x-drop-delete :title="translate('Delete')" :url="route('amenities.delete', $amenities->slug)" />
                                </x-dropdown>

                            </div>
                            <div class="amenities-text">
                                <h4>{{ $amenities->title }}</h4>
                                @if ($amenities->status == 1)
                                    <span class="badge text-bg-primary p-2">{{ translate('Active') }}</span>
                                @else
                                    <span class="badge text-bg-danger p-2">{{ translate('Inactive') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    @include('admin::no_data');
                @endforelse
            </div>
        </div>


    </div>
@endsection
