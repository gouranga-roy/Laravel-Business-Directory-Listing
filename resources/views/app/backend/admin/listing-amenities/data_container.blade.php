@php
    use App\Models\ListingAmenity;

    $listingAmenity = ListingAmenity::where('type_id', $type_id);

    $hasAmenity = json_decode($listingAmenity->value('amenities_id'), true);

@endphp

<div class="col-xxl-9 col-lg-8 col-md-8">

    <div class="table-area">
        <div class="row row-20">

            <div class="col-12">
                <div class="card">
                    @if (!empty($hasAmenity))
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

                                    @foreach ($hasAmenity as $amenity)
                                        <tr>
                                            <td> {{ getAmenity($amenity)->title }} </td>
                                            <td class="amenitiesImg">
                                                <img src="{{ getImage(getAmenity($amenity)->image) }}" alt="">
                                            </td>
                                            <td>
                                                @if (getAmenity($amenity)->status == 1)
                                                    <span class="badge text-bg-primary p-2">Active</span>
                                                @else
                                                    <span class="badge text-bg-danger p-2">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <x-dropdown>
                                                    <x-drop-modal :title="translate('Edit')" :url="path(['admin::amenities.edit', 'slug' => getAmenity($amenity)->slug])" />
                                                    <x-drop-delete :title="translate('Delete')" :url="route('amenities.delete', getAmenity($amenity)->slug)" />
                                                </x-dropdown>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        @include('admin::no_data');
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
