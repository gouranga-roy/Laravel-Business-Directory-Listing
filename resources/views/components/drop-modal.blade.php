@props(['title', 'url', 'size', 'icon', 'divider'])

<li @isset($divider)class="divider"@endisset>
    <button type="button" data-modal="modal" data-url="{!! $url !!}" data-title="{{ translate($title) }}" @isset($size) data-size="{{ $size }}" @endisset class="dropdown-item">
        <i class="{{ isset($icon) ? $icon : '' }}"></i>
        {{ translate($title) }}
    </button>
</li>
