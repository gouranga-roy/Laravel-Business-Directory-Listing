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
                                    <x-dropdown class="actionBtn">
                                        <a href="{{ route('blog.edit', $blog->slug) }}" class="dropdown-item">{{ translate('Edit') }}</a>
                                        <x-drop-delete :title="translate('Delete')" :url="route('blog.delete', $blog->id)" />
                                    </x-dropdown>
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
