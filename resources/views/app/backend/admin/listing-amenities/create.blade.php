@php
    use App\Models\Type;
    use App\Models\Amenities;

    $amenities = Amenities::get();

    $typeName = Type::where('id', $type_id)->value('name');

@endphp

<div class="amenitiesWrapper">
    <div class="text-center mb-30">
        <h4>Add Amenities For <span> {{ $typeName }}</span></h4>
    </div>
    <form action="{{ route('listAmenities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="type_id" value="{{ $type_id }}" />
        <ul>
            @forelse ($amenities as $amenity)
                <li>
                    <div class="form-check">
                        <input type="checkbox" id="{{ $amenity->slug }}" class="form-check-input" name="amenities[]" value="{{ $amenity->id }}" />
                        <label for="{{ $amenity->slug }}" class="form-check-label">{{ $amenity->title }}</label>
                    </div>
                </li>
            @empty
                <h4>Not Found Amenities</h4>
            @endforelse

        </ul>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-dark rounded-6">{{ translate('Insert Amenities') }}</button>
        </div>
    </form>
</div>
