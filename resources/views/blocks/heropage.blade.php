<section data-block-name="heropage" class="relative h-[70svh] flex items-center" x-data="hero">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <div x-ref="media" class="absolute inset-0 w-full h-full scale-110 will-change-transform">
            <x-responsivemedia :mediagroup="$responsivemediagroup" />
        </div>
        @if (!$removegradiant)
            <div x-ref="gradient" class="absolute inset-0 bg-gradient-to-t from-red/70 to-red/0 opacity-0"></div>
        @endif
    </div>
    <div class="container grid relative">
        <div class="col-span-12 lg:col-span-9 lg:col-start-4">
            <h1 class="text-32 md:text-50 text-white uppercase opacity-0" x-ref="text">{!! $headline !!}</h1>
        </div>
    </div>
</section>
