@if ($image)
    @php
        $focus = get_post_meta($image['id'], '_wpsmartcrop_image_focus', true);
        $shouldContain = isset($contain) ? $contain : false;
        $isSvg = str_contains($image['url'], 'svg');
    @endphp

    @if ($isSvg)
        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="absolute left-0 top-0 w-full h-full @if ($shouldContain) object-contain object-top @else  object-cover @endif" />
    @else
        <img src="{{ $image['url'] }}" srcset="{{ wp_get_attachment_image_srcset($image['id']) }}" sizes="{{ isset($sizes) ? '(max-width: ' . $sizes . ') 100vw, ' . $sizes : '100vw' }}"
            class="absolute left-0 top-0 w-full h-full @if ($shouldContain) object-contain object-top @else  object-cover @endif"
            @if ($focus && !$shouldContain) style="object-position: {{ $focus['left'] }}% {{ $focus['top'] }}% ;" @endif alt="{{ $image['alt'] }}" />
    @endif
@endif
