@extends('layouts::backend')
@push('title', 'Directory Create')

@section('content')
    <div class="directoryList-wrapper">

        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Create Listing') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <a href="{{ route('directoryList') }}" class="btn btn-sm btn-dark">{{ translate('Back Listing') }}</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('directoryList.store') }}" method="post" class="ajaxForm" enctype="multipart/form-data" class="mb-20">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="listing_id" class="form-label  required ">
                                    {{ translate('Select List Type') }}
                                </label>
                                <x-select name="listing_id" placeholder="{{ translate('Select Type.') }}">
                                    <option value=""></option>

                                    @foreach ($list_type as $list)
                                        <option value="{{ $list->id }}"> {{ $list->name }} </option>
                                    @endforeach
                                </x-select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="category_id" class="form-label required">
                                    {{ translate('Select List Categories') }}
                                </label>
                                <x-select name="category_id" placeholder="{{ translate('Select categories.') }}">
                                    <option value=""></option>
                                </x-select>

                            </div>
                        </div>
                    </div>

                    <div class="rounded-10 bg-light p-3">

                        <div class="import-content"></div>

                        <div class="default-view">
                            <span><i class="fi fi-br-plus"></i></span>
                            <h4>{{ translate('Select Listing type from dropdown.') }}</h4>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        'use strict';

        // Listing Directory
        $(document).on('change', '#listing_id', function() {
            let typeId = $(this).val();

            $.ajax({
                url: "{{ route('directoryList.search') }}",
                type: 'GET',
                data: {
                    type_id: typeId
                },
                success: function(res) {

                    let option = "";

                    option = `<option value=""></option>`;
                    res.categories.forEach(category => {
                        option += `<option value="${category.value}">${category.label}</option>`;
                    });

                    $("#category_id").html(option);

                    if (res.success) {

                        $('.import-content').html(res.contentForm);

                        $('.field-content').html(res.customField);

                        $('.default-view').css({
                            'display': 'none'
                        });

                    }
                }
            });
        });

        // Listing Country & Cities
        $(document).on('change', '#country', function() {

            let country_id = $(this).val();

            $.ajax({
                url: "{{ route('directoryList.cities') }}",
                type: "GET",
                data: {
                    country_id: country_id
                },

                success: function(res) {

                    let option = "";
                    option = `<option value=""></option>`;

                    res.cities.forEach(city => {
                        option += `<option value="${city.id}">${city.name}</option>`;
                    });

                    $('#citySelect').html(option);

                }

            });

        });
    </script>
@endpush
