<header class="container">
    <a class="brand" href="{{ home_url('/') }}">
        {!! $siteName !!}
    </a>

    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
    @endif

    <ul>
        @foreach (pll_the_languages(['raw' => 1]) as $translation)
            <li>
                <a href="{{ $translation['url'] }}" hreflang="{{ $translation['slug'] }}" style="{{ $translation['current_lang'] ? 'font-weight: bold;' : '' }}">
                    {{ $translation['slug'] }}
                </a>
            </li>
        @endforeach
    </ul>

</header>
