@extends('layouts::backend')
@push('title', 'Directory Create')

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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-input type="text" name="list_type" value="{{ $directoryList->title }}" label="Text Label" readonly></x-input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="category_id" class="form-label required">
                                    {{ translate('Select List Categories') }}
                                </label>
                                <x-select name="category_id" placeholder="{{ translate('Select categories.') }}">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->title }}">{{ $category->title }}</option>
                                    @endforeach
                                </x-select>

                            </div>
                        </div>
                    </div>

                    <div class="rounded-10 bg-light p-3">

                        <div class="import-content"></div>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
