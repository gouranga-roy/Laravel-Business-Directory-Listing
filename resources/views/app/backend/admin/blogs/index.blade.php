@extends('layouts::backend')
@push('title', 'Category')

@section('content')
    <div class="blogCategory-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Blogs') }}</h4>
            </div>

            <div class="col-lg-6 col-md-6 text-end">
                <a href="{{ route('blog.create') }}" class=" btn btn-sm btn-dark">{{ translate('Create Blog') }}</a>
            </div>
        </div>

        <div class="col-12">
            <div class="blogCategory">
                <table class="table table-striped table-hover align-middle">

                    <thead>
                        <tr>
                            <th scope="col">{{ translate('#') }}</th>
                            <th scope="col"> {{ translate('Title') }}</th>
                            <th scope="col"> {{ translate('Category') }}</th>
                            <td scope="col">{{ translate('Popular') }}</td>
                            <th scope="col"> {{ translate('Status') }}</th>
                            <th scope="col"> {{ translate('Action') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ getImage($blog->image) }}" alt="">
                                        {{ $blog->title }}
                                    </div>
                                </td>
                                <td>
                                    {{ $blog->categories->title }}
                                </td>
                                <td>
                                    <span class="badge {{ $blog->popular == 1 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $blog->popular == 1 ? 'Enable' : 'Disable' }}</span>
                                </td>
                                <td>
                                    <span class="badge text-bg-primary">{{ $blog->is_published == 1 ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td>
                                    <div class="dropdown d-flex justify-content-end listCustomAction">
                                        <button class="btn btn-white border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>

                                        <ul class="dropdown-menu rounded-6 dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('blog.edit', $blog->slug) }}">{{ translate('Edit') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('blog.delete') }}"><i class="fi fi-rr-trash"></i> <span>{{ translate('Delete') }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
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
