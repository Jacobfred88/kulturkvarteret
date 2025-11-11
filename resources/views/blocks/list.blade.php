<section data-block-name="list" class="my-24 md:my-36">
    <div class="container">
        @if ($headline)
            <h2 class="mb-10 md:mb-28">{{ $headline }}</h2>
        @endif
        @if ($entries)
            <div class="flex flex-col gap-y-28 md:gap-y-40">
                @foreach ($entries as $entry)
                    <div class="grid gap-y-6">
                        <div class="col-span-12 lg:col-span-3">
                            <h3 class="text-24 md:text-32">{!! $entry['headline'] !!}</h3>
                        </div>
                        <div class="col-span-12 lg:col-span-9">
                            @if ($entry['text'])
                                <div class="richtext text-32 md:text-50 max-w-5xl">{!! $entry['text'] !!}</div>
                            @endif

                            @if ($entry['link'])
                                <a href="{{ $entry['link']['url'] }}" target="{{ $entry['link']['target'] }}" class="link-btn mt-6 inline-block">{{ $entry['link']['title'] }}</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
