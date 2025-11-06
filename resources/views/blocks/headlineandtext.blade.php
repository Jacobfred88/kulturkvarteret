<section data-block-name="headlineandtext">
    <div class="container grid py-32">
        <div class="col-span-12 lg:col-span-6">
            @if ($headline)
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-span-12 lg:col-span-6">
            @if ($text)
                <div class="mb-5">{!! $text !!}</div>
            @endif

            @if ($link)
                <a href="{{ $link['url'] }}" target="{{ $link['target'] }}">{{ $link['title'] }}</a>
            @endif
        </div>
    </div>
</section>
