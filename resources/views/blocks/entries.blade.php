<section data-block-name="entries">
    <div class="container grid py-32">
        <div class="col-span-12 lg:col-span-3">
            @if ($headline)
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-span-12 lg:col-span-9">
            @if ($entries)

                <div class="flex -mx-2.5">
                    @foreach ($entries as $entry)
                        <div class="w-full lg:w-1/3 flex-shrink-0 px-2.5">
                            <div class="mb-5">
                                <div class="relative aspect-square">
                                    <x-media :mediagroup="$entry['mediagroup']" />
                                </div>
                            </div>
                            @if (!empty($entry['headline']))
                                <h3>{{ $entry['headline'] }}</h3>
                            @endif

                            @if (!empty($entry['text']))
                                <div class="richtext">{!! $entry['text'] !!}</div>
                            @endif

                            @if (!empty($entry['link']))
                                <a href="{{ $entry['link']['url'] }}" target="{{ $entry['link']['target'] }}">{{ $entry['link']['title'] }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
</section>
