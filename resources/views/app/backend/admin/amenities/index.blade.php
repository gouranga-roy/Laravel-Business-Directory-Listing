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

        <div class="table-area">
            <div class="row row-20">
                <div class="col-12">
                    <div class="card">
                        <div class="chart-card-header">
                            <p class="fs-16 fw-500 text-secondary mb-0">Hotel Amenities List</p>
                            <div>
                                <div class="chart-control cs-width90 d-flex align-items-center gap-8">
                                    <select class="custom-selectTo" name="state">
                                        <option value="">This Year</option>
                                        <option value="">2026</option>
                                        <option value="">2027</option>
                                        <option value="">2028</option>
                                        <option value="">2029</option>
                                        <option value="">2030</option>
                                    </select>
                                    <div class="dropdown filtr-btn">
                                        <button class="btn btn-light bg-white border rounded-8 fs-12 fw-500 dropdown-toggle d-flex align-items-center gap-1 text-body" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="lh-1">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.5003 7.58341H3.50033C3.15033 7.58341 2.91699 7.35008 2.91699 7.00008C2.91699 6.65008 3.15033 6.41675 3.50033 6.41675H10.5003C10.8503 6.41675 11.0837 6.65008 11.0837 7.00008C11.0837 7.35008 10.8503 7.58341 10.5003 7.58341Z"
                                                        fill="#0E0F14" />
                                                    <path d="M8.75033 11.0834H5.25033C4.90033 11.0834 4.66699 10.8501 4.66699 10.5001C4.66699 10.1501 4.90033 9.91675 5.25033 9.91675H8.75033C9.10033 9.91675 9.33366 10.1501 9.33366 10.5001C9.33366 10.8501 9.10033 11.0834 8.75033 11.0834Z"
                                                        fill="#0E0F14" />
                                                    <path d="M12.2503 4.08341H1.75033C1.40033 4.08341 1.16699 3.85008 1.16699 3.50008C1.16699 3.15008 1.40033 2.91675 1.75033 2.91675H12.2503C12.6003 2.91675 12.8337 3.15008 12.8337 3.50008C12.8337 3.85008 12.6003 4.08341 12.2503 4.08341Z"
                                                        fill="#0E0F14" />
                                                </svg>
                                            </span>
                                            Filter
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Student Table -->
                        <div class="table-responsive">
                            <table class="table align-middle fs-12 text-secondary student-table">
                                <thead class="table-light">
                                    <tr class="">
                                        <th scope="col"> {{ translate('Title') }} </th>
                                        <th scope="col"> {{ translate('Image') }}</th>
                                        <th scope="col"> {{ translate('Status') }}</th>
                                        <th scope="col">
                                            <span class="d-flex justify-content-end"> {{ translate('Action') }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($amenities_list as $amenities)
                                        <tr>
                                            <td> {{ $amenities->title }} </td>
                                            <td class="amenitiesImg">
                                                <img src="{{ getImage($amenities->image) }}" alt="">
                                            </td>
                                            <td>
                                                @if ($amenities->status == 1)
                                                    <span class="badge text-bg-primary p-2">Active</span>
                                                @else
                                                    <span class="badge text-bg-danger p-2">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <x-dropdown>
                                                    <x-drop-modal :title="translate('Edit')" :url="path(['admin::amenities.edit', 'slug' => $amenities->slug])" />
                                                    <x-drop-delete :title="translate('Delete')" :url="route('amenities.delete', $amenities->slug)" />
                                                </x-dropdown>
                                            </td>
                                        </tr>
                                    @empty
                                        @include('admin::no_data');
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
