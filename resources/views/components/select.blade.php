@props(['name', 'id' => null, 'label' => null, 'value' => null, 'options' => [], 'placeholder' => null])

<div class="mb-3 {{ $attributes->get('class') }}">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="form-label @if ($attributes->has('required')) required @endif">
            {{ $label }}
        </label>
    @endif

    <select id="{{ $id ?? $name }}" name="{{ $name }}" class="form-select select2" data-placeholder="{{ $placeholder }}">
        {{ $slot }}
    </select>
</div>
