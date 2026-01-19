<section data-block-name="heropage" class="relative h-[70svh] flex items-center bg-red" x-data="hero">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <div x-ref="media" class="absolute inset-0 w-full h-full scale-110 will-change-transform">
            <x-responsivemedia :mediagroup="$responsivemediagroup" sizes="1600px" />
        </div>
        <div class="absolute inset-0 h-1/3 bg-gradient-to-b from-black/70 to-black/0"></div>
        @if (!$removegradiant)
            <div x-ref="gradient" class="absolute inset-0 bg-gradient-to-t from-red/70 to-red/0 opacity-0"></div>
        @endif
    </div>
    <div class="container grid relative">
        <div class="col-span-12 lg:col-span-9 lg:col-start-4">
            <h1 class="text-32 md:text-50 text-white uppercase" x-cloak x-ref="text">{!! $headline !!}</h1>
        </div>
    </div>
</section>
