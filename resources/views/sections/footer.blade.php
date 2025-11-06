<footer class="bg-red text-white py-32">
    <div class="container grid gap-y-32">
        <div class="col-span-12 lg:col-span-3">
            @if (get_field('address', 'option'))
                <p>
                    {!! get_field('address', 'option') !!}
                </p>
            @endif
            @if (get_field('phone', 'option'))
                <p>
                    <a href="tel:{!! get_field('phone', 'option') !!}">{!! get_field('phone', 'option') !!}</a>
                </p>
            @endif
            @if (get_field('email', 'option'))
                <p>
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
        <div class="col-span-12">
            <a class="w-32 block" href="{{ home_url('/') }}">
                <x-logo />
            </a>
        </div>
    </div>

</footer>
