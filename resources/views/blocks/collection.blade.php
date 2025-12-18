<section data-block-name="collection" class="my-24 md:my-36">
    <div class="container">
        @if ($headline)
            <h2 class="text-16 max-w-[17.5rem] text-balance mb-5">
                {!! $headline !!}
            </h2>
        @endif
        @if ($items)
            <ul class="flex flex-wrap text-32 md:text-50 uppercase" x-cloak x-data="animate('revealchildren')">

                @foreach ($items as $item)
                    @php
                        $fields = get_fields($item->ID);
                    @endphp
                    <li class="after:content-[','] mr-2 last:mr-0 last:after:hidden"><a href="{{ get_permalink($item) }}">{{ $fields['headline'] ? $fields['headline'] : $item->post_title }}</a></li>
                @endforeach

            </ul>
        @endif
    </div>
</section>
