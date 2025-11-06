<section data-block-name="list" class="my-32">
    <div class="container">
        @if ($headline)
            <h2>{{ $headline }}</h2>
        @endif

        @foreach ($entries as $entry)
            <div class="grid mb-20">
                <div class="col-span-12 lg:col-span-3">
                    <h3 class="text-24 mb-8">{!! $entry['headline'] !!}</h3>
                </div>
                <div class="col-span-12 lg:col-span-9">
                    @if ($entry['text'])
                        <div class="richtext mb-5 text-32">{!! $entry['text'] !!}</div>
                    @endif

                    @if ($entry['link'])
                        <a href="{{ $entry['link']['url'] }}" target="{{ $entry['link']['target'] }}">{{ $entry['link']['title'] }}</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
