@php
    $type = $mediagroup['mediatype'];
    $desktopambientvideo = $mediagroup['desktopambientvideo'];
    $mobileambientvideo = $mediagroup['mobileambientvideo'];

    $desktopimage = $mediagroup['desktopimage'];
    $mobileimage = $mediagroup['mobileimage'];

@endphp
<div class="absolute left-0 top-0 w-full h-full">
    @if ($type === 'image' || $type === 'video')
        @if ($desktopimage)
            <div class="absolute left-0 top-0 w-full h-full @if ($mobileimage) hidden lg:block @endif">
                <x-image :image=$desktopimage :lazy="isset($lazy) ? $lazy : true" :sizes="isset($sizes) ? $sizes : null" />
            </div>
        @endif

        @if ($mobileimage)
            <div class="absolute left-0 top-0 w-full h-full @if ($desktopimage) lg:hidden @endif">
                <x-image :image=$mobileimage :lazy="isset($lazy) ? $lazy : true" :sizes="isset($sizes) ? $sizes : null" />
            </div>
        @endif
    @endif

    @if ($type === 'ambientvideo')
        @if ($desktopambientvideo)
            <div class="absolute left-0 top-0 w-full h-full @if ($mobileambientvideo) hidden lg:block @endif">
                <x-ambientvideo :src=$desktopambientvideo :poster="$desktopimage" />
            </div>
        @endif
        @if ($mobileambientvideo)
            <div class="absolute left-0 top-0 w-full h-full @if ($desktopambientvideo) lg:hidden @endif">
                <x-ambientvideo :src=$mobileambientvideo :poster="$desktopimage" />
            </div>
        @endif
    @endif

</div>
