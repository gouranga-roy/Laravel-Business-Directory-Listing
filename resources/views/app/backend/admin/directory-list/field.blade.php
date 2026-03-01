<div class="row">

    @foreach ($fieldGet as $field)
        <div class="col-md-6">
            {{-- <x-input type="{{ $field->field }}" label="{{ translate($field->label) }}" name="{{ preg_replace('#[ -]+#', '-', strtolower($field->label)) }}" /> --}}

            <x-input type="{{ $field->field }}" label="{{ translate($field->label) }}" name="cus_field[{{ $field->id }}]" />
        </div>
    @endforeach

</div>
