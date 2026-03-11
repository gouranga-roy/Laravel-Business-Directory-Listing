@props(['type' => 'text', 'name', 'id' => null, 'label' => null, 'autocomplete' => null, 'note' => null]);

<div class="mb-3 @if ($attributes->has('class')) {{ $attributes->get('class') }} @endif">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="mb-10 form-label">
            {{ $label }} <small class="text-muted">{{ $note }}</small>
        </label>
    @endif
    <div class="d-flex align-items-center gap-4 flex-wrap">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="cus_field[{{ $field->id }}]" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Item One
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="cus_field[{{ $field->id }}]" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck1">
                Item Three
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="cus_field[{{ $field->id }}]" id="defaultCheck3">
            <label class="form-check-label" for="defaultCheck1">
                Item fore
            </label>
        </div>
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
