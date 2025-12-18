@php
    $translations = array_reverse(pll_the_languages(['raw' => 1]));
    $current = pll_current_language();
@endphp
<header class="absolute w-full z-50 text-white py-5">
    <div class="container grid">
        <div class="col-span-6 lg:col-span-9">
            <a class="w-[8.4375rem] lg:w-[14.765625rem] block lg:fixed" href="{{ home_url('/') }}{{ $current != 'da' ? $current : '' }}" x-data="logo">
                <x-logo />
            </a>
        </div>
        <div class="col-span-6 lg:col-span-3 flex justify-end lg:justify-between items-start">
            <ul class="hidden lg:flex items-center">
                @foreach ($translations as $translation)
                    <li class="group">
                        <a class="uppercase text-16" href="{{ $translation['url'] }}" hreflang="{{ $translation['slug'] }}" style="{{ $translation['current_lang'] ? 'font-weight: bold;' : '' }}">
                            {{ $translation['slug'] }}
                            <span class="group-last:hidden translate-y-[-0.015rem] ml-0.5 mr-1.5 inline-block font-medium">/</span>
                        </a>
                    </li>
                @endforeach
            </ul>

            @php
                $closelabel = function_exists('pll_current_language') && pll_current_language('slug') === 'en' ? 'Close X' : 'Luk X';
            @endphp

            <button class="text-16 font-bold uppercase cursor-pointer outline-0" @click="$store.menu.toggle()" x-data x-text="$store.menu.open ? '{{ $closelabel }}' : 'Menu'">Menu</button>
        </div>

    </div>
</header>
<div x-data="menu" x-cloak class="fixed top-0 left-0 w-full h-svh backdrop-blur-[75px]  bg-gradient-to-t from-red to-red/0 z-40 py-40 lg:py-50 text-white overflow-y-scroll">
    <div class="container">
        <ul class="flex lg:hidden mb-12">
            @foreach ($translations as $translation)
                <li class="group">
                    <a class="uppercase text-16" href="{{ $translation['url'] }}" hreflang="{{ $translation['slug'] }}" style="{{ $translation['current_lang'] ? 'font-weight: bold;' : '' }}">
                        {{ $translation['slug'] }}
                        <span class="group-last:hidden translate-y-[-0.015rem] ml-0.5 mr-1.5 inline-block font-medium">/</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @if (has_nav_menu('primary_navigation'))
            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">

                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'nav',
                    'echo' => false,
                    'depth' => 3,
                    'walker' => new CustomWalker(),
                ]) !!}
            </nav>
        @endif
    </div>
</div>
@php
    class CustomWalker extends Walker_Nav_Menu
    {
        function start_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $classes = match ($depth) {
                0 => 'submenu flex flex-wrap mt-8 mb-8',
                1 => 'submenu-level-2 mt-8 flex flex-wrap',
                default => 'submenu-level-' . ($depth + 1),
            };
            $output .= "\n$indent<ul class=\"$classes\" x-show=\"open\">\n";
        }

        function end_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $indent = str_repeat("\t", $depth);

            $classes = empty($item->classes) ? [] : (array) $item->classes;
            $classes[] = match ($depth) {
                0 => 'mb-1 lg:mb-2',
                1 => 'mb-1 lg:mb-2 after:content-[","] after:mr-2.5 last:after:hidden',
                default => 'mb-8 after:content-[","] after:mr-2.5 last:after:hidden',
            };

            $has_children = in_array('menu-item-has-children', $classes);
            $alpine_attrs = $has_children ? ' x-data="{ open: false }"' : '';

            $class_names = join(' ', $classes);
            $output .= $indent . '<li class="' . esc_attr($class_names) . '"' . $alpine_attrs . '>';

            $link_classes = match ($depth) {
                0 => 'text-32 lg:text-50 uppercase',
                1 => 'text-24 lg:text-30 uppercase hover:underline underline-offset-2 decoration-2',
                default => 'text-24 lg:text-30 uppercase',
            };

            if ($has_children) {
                $output .=
                    '<a href="' .
                    esc_attr($item->url) .
                    '" class="' .
                    $link_classes .
                    '" @click.prevent="open = !open" x-effect="if (!$store.menu.open) open = false">' .
                    apply_filters('the_title', $item->title, $item->ID) .
                    ' <span class="ml-0" x-text="open ? \'–\' : \'+\'">+</span></a>';
            } else {
                $output .= '<a href="' . esc_attr($item->url) . '" class="' . $link_classes . '">' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
            }
        }

        function end_el(&$output, $item, $depth = 0, $args = null)
        {
            $output .= "</li>\n";
        }
    }
@endphp
