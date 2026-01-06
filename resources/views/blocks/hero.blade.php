<section data-block-name="hero" x-data="hero" class="relative h-svh flex items-center overflow-hidden">
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        <div x-ref="media" class="absolute inset-0 w-full h-full scale-110 will-change-transform">
            <x-responsivemedia :mediagroup="$responsivemediagroup" sizes="1600px" />
        </div>
        @if (!$removegradiant)
            <div x-ref="gradient" class="absolute inset-0 bg-gradient-to-t from-red/70 to-red/0 opacity-0"></div>
        @endif
    </div>
    <div class="container grid relative">
        <div class="col-span-12 lg:col-span-9 lg:col-start-4">
            <h1 class="text-32 md:text-50 text-white uppercase opacity-0" x-cloak x-ref="text">{!! $headline !!}</h1>
        </div>
    </div>
    @if (!empty($nudge))
        <div class="absolute w-full flex justify-center bottom-10 items-start gap-2.5 opacity-0 cursor-pointer" x-ref="nudge" @click="scrollDown">
            <div class="w-8 flex-shrink-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 35 34" class="w-full h-auto block">
                    <path fill="#fff" d="m22.8 18.65-5.64 3.93-5.7-3.93v-1.5l5.7 3.81 5.64-3.81zm-5.04 2.7h-1.23V10.4h1.23z" />
                    <circle cx="17" cy="17" r="16.5" stroke="#fff" />
                </svg>
            </div>
            <p class="text-white text-16 max-w-2xs text-balance">{{ $nudge }}</p>
        </div>
    @endif
</section>
