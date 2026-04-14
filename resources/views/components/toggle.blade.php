@props(['name', 'id' => null, 'label' => null, 'value' => null, 'checked' => false])

<div class="mb-2 gap-2 mb-16 @if ($attributes->has('class')) {{ $attributes->get('class') }} @endif ">
    @if ($label)
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <div class="form-switch dtable-switch p-0 mt-2">
        <input class="form-check-input" type="checkbox" name="{{ $name }}" value="{{ $value }}" role="switch" id="{{ $id ?? $name }}" @checked($checked) />
    </div>
</div>
