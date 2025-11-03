@php
    $type = $mediagroup['mediatype'];
    $ambientvideo = $mediagroup['ambientvideo'];
    $image = $mediagroup['image'];

@endphp

<div class="absolute left-0 top-0 w-full h-full object-cover">
    @if ($type === 'image' || $type === 'video')
        <x-image :image=$image :sizes="isset($sizes) ? $sizes : null" :contain="isset($contain)" />
    @endif

    @if ($type === 'ambientvideo')
        <x-ambientvideo :src=$ambientvideo :poster="$image" />
    @endif

</div>
