<footer class="relative bg-gradient-to-b min-h-[40rem] lg:min-h-[45rem] from-white to-red text-white pb-7 flex items-end z-20">
    <div class="container grid">
        <div class="col-span-12 lg:col-span-3 mb-12">
            @if (get_field('address', 'option'))
                <p class="text-18 font-semibold">
                    {!! nl2br(get_field('address', 'option')) !!}
                </p>
            @endif
            @if (get_field('phone', 'option'))
                <p class="text-18">
                    <a href="tel:{!! get_field('phone', 'option') !!}">{!! get_field('phone', 'option') !!}</a>
                </p>
            @endif
            @if (get_field('email', 'option'))
                <p class="text-18">
                    <a href="mailto:{!! get_field('email', 'option') !!}">{!! get_field('email', 'option') !!}</a>
                </p>
            @endif
        </div>
        <div class="col-span-12 lg:col-span-3">
            @if (get_field('socials', 'option'))
                <ul>
                    @foreach (get_field('socials', 'option') as $social)
                        <li>
                            <a href="{{ $social['social']['url'] }}" target="{{ $social['social']['target'] }}">
                                {{ $social['social']['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-span-12 mt-12 md:mt-32">
            <a class="w-[8.4375rem] lg:w-[18.3125rem] block" href="{{ home_url('/') }}">
                <x-logo />
            </a>
        </div>
    </div>

</footer>
