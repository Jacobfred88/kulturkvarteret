<section data-block-name="related">

    <div class="container grid py-32">
        <div class="col-span-12 lg:col-span-3">
            @if ($headline)
                <h2>{{ $headline }}</h2>
            @endif
        </div>
        <div class="col-span-12 lg:col-span-9">
            @if ($items)
                <div class="flex -mx-2.5">
                    @foreach ($items as $item)
                        @php
                            $fields = get_fields($item->ID);
                        @endphp
                        <div class="w-full lg:w-1/3 flex-shrink-0 px-2.5">
                            <div class="mb-5">
                                <div class="relative aspect-square">
                                    <x-media :mediagroup="$fields['mediagroup']" />
                                </div>
                            </div>

                            <h3>{{ $fields['headline'] ? $fields['headline'] : $item->post_title }}</h3>

                            @if (!empty($fields['intro']))
                                <div class="richtext">{!! $fields['intro'] !!}</div>
                            @endif

                            <a href="{{ get_permalink($item) }}">Læs mere</a>
                        </div>
                    @endforeach
                </div>

            @endif
        </div>
</section>
