<section data-block-name="content" class="my-24 md:my-36">
    <div class="container grid">
        <div class="col-span-12 lg:col-span-3">
            @if ($headline)
                <h2 class="text-24 md:text-30 mb-10">{{ $headline }}</h2>
            @endif

            @if ($asidetext)
                <div class="mb-10">{!! $asidetext !!}</div>
            @endif

        </div>
        <div class="col-span-12 lg:col-span-6">
            @if ($text)
                <div class="richtext">{!! $text !!}</div>
            @endif

            @if ($link)
                <a href="{{ $link['url'] }}" target="{{ $link['target'] }}" class="link-btn mt-10 inline-block">{{ $link['title'] }}</a>
            @endif
        </div>
    </div>
</section>
