@php
    use App\Models\Amenities;
    use App\Models\ListingAmenity;
    use App\Models\Type;

    $amenities = Amenities::get();

    $listingAmenity = ListingAmenity::where('type_id', $type_id)->first();

    $hasAmenityIds = $listingAmenity ? $listingAmenity->amenities_id : [];

    $type = Type::find($type_id);

@endphp

<div class="amenitiesWrapper">
    <div class="text-center mb-30">
        @if ($type)
            <h4>{{ translate('Edit Amenities For') }} <span>{{ $type->name }}</span></h4>
        @endif

    </div>

    <form action="{{ route('listAmenities.update') }}" method="POST">
        @csrf
        <input type="hidden" name="type_id" value="{{ $type_id }}" />

        <ul class="list-unstyled">
            @forelse ($amenities as $amenity)
                <li class="mb-2">
                    <div class="form-check">
                        <input type="checkbox" id="{{ $amenity->slug }}" class="form-check-input" name="amenities[]" value="{{ $amenity->id }}" {{ in_array($amenity->id, $hasAmenityIds) ? 'checked' : '' }} />

                        <label for="{{ $amenity->slug }}" class="form-check-label">
                            {{ $amenity->title }}
                        </label>
                    </div>
                </li>
            @empty
                <h5 class="text-danger">No amenities found</h5>
            @endforelse
        </ul>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-dark rounded-6">
                Update Amenities
            </button>
        </div>
    </form>
</div>
