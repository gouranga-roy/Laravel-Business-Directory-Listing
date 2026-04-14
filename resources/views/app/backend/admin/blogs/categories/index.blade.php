@extends('layouts::backend')
@push('title', 'Category')


@section('content')
    <div class="blogCategory-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Blog Categories') }}</h4>
            </div>

            <div class="col-lg-6 col-md-6 text-end">
                <x-btn-modal :title="translate('Add Category')" :url="path(['admin::blogs.categories.create'])" />
            </div>
        </div>

        <div class="col-12">
            <div class="blogCategory">
                <table class="table table-striped table-hover align-middle">

                    <thead>
                        <tr>
                            <th scope="col">{{ translate('#') }}</th>
                            <th scope="col"> {{ translate('Title') }}</th>
                            <th scope="col"> {{ translate('Image') }}</th>
                            <th scope="col"> {{ translate('Status') }}</th>
                            <th scope="col"> {{ translate('Action') }}</th>
                        </tr>
                    </thead>


                    <tbody class="table-group-divider">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <img src="{{ getImage($category->image) }}" alt="">
                                </td>
                                <td>
                                    <span class="badge text-bg-primary">{{ $category->status == 1 ? 'active' : '' }}</span>
                                </td>
                                <td>
                                <td>
                                    <x-dropdown class="actionBtn">
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.blogs.categories.edit', 'id' => $category->id])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('blogCategory.delete', $category->id)" />
                                    </x-dropdown>
                                </td>

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
