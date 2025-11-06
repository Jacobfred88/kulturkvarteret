<section data-block-name="collection">
    <div class="container py-32">
        @if ($headline)
            <h2>
                {{ $headline }}
            </h2>
        @endif
        @if ($items)
            <ul>
                @foreach ($items as $item)
                    @php
                        $fields = get_fields($item->ID);
                    @endphp

                    <li><a href="{{ get_permalink($item) }}">{{ $fields['headline'] ? $fields['headline'] : $item->post_title }}</a></li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
