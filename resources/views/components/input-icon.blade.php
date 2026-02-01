@props(['type' => 'text', 'name', 'id' => null, 'label' => null, 'icon' => null, 'autocomplete' => null, 'note' => null, 'placeholder' => 'Select icon'])

<div class="mb-3">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="form-label @if ($attributes->has('required')) required @endif">
            {{ $label }} <small class="text-muted">{{ $note }}</small>
        </label>
    @endif
    <div class="input-group @if ($attributes->has('class')) {{ $attributes->get('class') }} @endif">
        <span class="input-group-text" id="{{ $id ?? $name }}"><i class="{{ $icon ? $icon : 'fa-solid fa-cloud-arrow-up' }}"></i></span>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" class="form-control @if ($attributes->has('class')) {{ $attributes->get('class') }} @endif" placeholder="{{ $placeholder }}" aria-label="Username" aria-describedby="{{ $id ?? $name }}"
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')]) }} autocomplete="{{ $autocomplete ?? $name }}" value="{{ $attributes->get('data-value') }}">
    </div>
</div>
