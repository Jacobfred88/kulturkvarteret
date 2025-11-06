<section data-block-name="image">
    <div class="container py-32">
        <div class="relative aspect-video">
            <x-responsivemedia :mediagroup="$responsivemediagroup" />
        </div>

        <div class="flex justify-between">
            @if ($caption)
                <p>{{ $caption }}</p>
            @endif

            @if ($credit)
                <p>Credit: {{ $credit }}</p>
            @endif
        </div>
    </div>
</section>
