@extends('layouts::backend')
@push('title', 'Dashboard')

@php
    use App\Models\Type;
    use App\Models\Category;

    $type_id = $slug ? Type::where('slug', $slug)->value('id') : Type::value('id');

@endphp

@section('content')
    <div class="categories-wrapper">
        <div class="row mb-20">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary">Listing Type Categories</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <x-btn-modal :title="translate('Add Category')" :url="path(['admin::category.create', 'type_id' => $type_id])" />
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3 col-lg-4 col-md-4">
                <div class="type-menu">
                    <ul>
                        @foreach ($list_type as $index => $type)
                            <li class="{{ ($slug && $type->slug == $slug) || (!$slug && $index == 0) ? 'active' : '' }}">
                                <a href="{{ route('category', [$type->slug]) }}">
                                    <figure>
                                        <img src="{{ getImage($type->image) }}" alt="">
                                    </figure>
                                    <span>{{ $type->name }}</span>
                                    <span class="count">{{ categoryCount($type->id) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @include('admin::category.data_container', ['slug' => $slug])
        </div>
    </div>
@endsection
