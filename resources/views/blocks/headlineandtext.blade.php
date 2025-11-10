<section data-block-name="headlineandtext">
    <div class="container grid py-14 md:py-32">
        <div class="col-span-12 lg:col-span-9">
            @if ($headline)
                <h2 class="text-32 md:text-50 uppercase text-balance max-w-4xl">{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-span-12 lg:col-span-3 mt-10 md:mt-6">
            @if ($text)
                <div class="mb-5 max-w-md">{!! $text !!}</div>
            @endif

            @if ($link)
                <a href="{{ $link['url'] }}" target="{{ $link['target'] }}" class="link-btn">{{ $link['title'] }}</a>
            @endif
        </div>
    </div>
</section>
