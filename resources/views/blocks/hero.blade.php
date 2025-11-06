<section data-block-name="hero" class="relative h-svh flex items-center">
    <div class=" absolute inset-0 w-full h-full">
        <x-responsivemedia :mediagroup="$responsivemediagroup" />
    </div>
    <div class="container relative">
        <h1 class="text-50 text-white uppercase text-center font-medium mb-20">{{ $headline }}</h1>
        @if (!empty($nudge))
            <p class="text-white text-center mb-20">{{ $nudge }}</p>
        @endif
    </div>
</section>
