@php
    use App\Models\ListingAmenity;
    use App\Models\Amenities;

    $listingAmenity = ListingAmenity::where('type_id', $type_id)->value('amenities_id');

    function getAmenity($amenityId)
    {
        $getAmenity = Amenities::where('id', $amenityId)->first();
        return $getAmenity;
    }

@endphp

<div class="col-xxl-9 col-lg-8 col-md-8">

    <div class="table-area">
        <div class="row row-20">

            <div class="col-12">
                <div class="card">

                    @if (!empty($listingAmenity))

                        <div class="amenitiesGrid-wrapper">
                            <div class="row">
                                @foreach ($listingAmenity as $amenity)
                                    <div class="col-lg-4 col-md-4">
                                        <div class="amenities-card">
                                            <img src="{{ getImage(getAmenity($amenity)->image) }}" alt="">
                                            <div class="amenities-text">
                                                <h4>{{ getAmenity($amenity)->title }}</h4>
                                                @if (getAmenity($amenity)->status == 1)
                                                    <span class="badge text-bg-primary p-2">{{ translate('Active') }}</span>
                                                @else
                                                    <span class="badge text-bg-danger p-2">{{ translate('Inactive') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <x-dropdown class="actionBtn">
                                        <x-drop-modal :title="translate('Edit')" :url="path(['admin::listing-amenities.edit', 'type_id' => $type_id, 'slug' => $slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('listAmenities.delete', $slug)" />
                                    </x-dropdown>
                                </div>
                            </div>
                        </div>
                    @else
                        @include('admin::no_data');
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>
