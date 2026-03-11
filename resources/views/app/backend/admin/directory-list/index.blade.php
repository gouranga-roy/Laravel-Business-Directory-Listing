@extends('layouts::backend')
@push('title', 'Directory List')

@section('content')
    <div class="directoryList-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Directory Listing') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <a href="{{ route('directoryList.create') }}" class="btn btn-sm btn-dark">{{ translate('Add New Listing') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3">
                <div class="directoryList-menu">
                    <ul>
                        @foreach ($list_type as $type)
                            <li class="active"><a href="{{ route('directoryList', [$type->slug]) }}">{{ $type->name }} <i class="fa-solid fa-arrow-right"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="directoryList-items">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{ translate('#') }}</th>
                                <th scope="col"> {{ translate('Title') }}</th>
                                <th scope="col"> {{ translate('Category') }}</th>
                                <th scope="col"> {{ translate('Price') }}</th>
                                <th scope="col"> {{ translate('Visibility') }}</th>
                                <th scope="col"> {{ translate('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach ($listsAll as $list)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td> {{ $list->title }} </td>
                                    <td> {{ $list->category->title }} </td>
                                    <td> {{ $list->price }} </td>
                                    <td>
                                        @if ($list->status == 1)
                                            <span class="badge rounded-pill text-bg-primary">Active</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning">Directive</span>
                                        @endif

                                    </td>
                                    <td>
                                        <button>Edit</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
