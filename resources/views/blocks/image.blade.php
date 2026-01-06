<section data-block-name="image" class="my-24 md:my-36">
    <div class="container">
        <div class="relative aspect-square md:aspect-[2.41] rounded-lg overflow-hidden">
            <x-responsivemedia :mediagroup="$responsivemediagroup" sizes="1600px" />
        </div>

        <div class="flex flex-col md:flex-row gap-y-1 justify-between mt-2.5">
            @if ($caption)
                <p class="text-10 uppercase">{{ $caption }}</p>
            @endif

            @if ($credit)
                <p class="text-10 uppercase">Credit: {{ $credit }}</p>
            @endif
        </div>
    </div>
</section>
