@props(['name', 'id' => null, 'label' => null, 'value' => null, 'placeholder' => null])

<div class="mb-3 @if ($attributes->has('class')) {{ $attributes->get('class') }} @endif">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="form-label"> {{ $label }}</label>
    @endif
    <input type="text" class="multiTagChoice" name="{{ $name }}" id="{{ $id ?? $name }}" value="{{ $value }}" data-placeholder="{{ $placeholder }}">
</div>
