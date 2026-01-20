@extends('layouts::backend')
@push('title', 'Dashboard')

@section('content')
    <div class="category-wrapper">
        <div class="row">
            <div class="col-xxl-3 col-lg-4 col-md-4">
                <div class="type-menu">
                    <ul>
                        @foreach ($list_type as $type)
                            <li>
                                <a href="#">
                                    <img src="{{ getImage($type->image) }}" alt="">
                                    <span>{{ $type->name }}</span>
                                    <span class="count">10</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-8 col-md-8">
                <div class="categories-items">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis rerum nihil aliquam, eos, fugiat asperiores ea repellendus rem veniam, labore itaque officia autem doloribus. Illum excepturi odit tempore. Molestias, eligendi?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
