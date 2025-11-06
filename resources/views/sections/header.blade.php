<header class="absolute w-full z-50 text-white py-5" x-data="{ $store.menu.open = false }">
    <div class="container grid">

        <div class="col-span-6 lg:col-span-9">
            <a class="w-32 block sticky top-0" href="{{ home_url('/') }}">
                <x-logo />
            </a>
        </div>
        <div class="col-span-6 lg:col-span-3 flex justify-end lg:justify-between items-start">
            <ul class="hidden lg:flex">
                @foreach (pll_the_languages(['raw' => 1]) as $translation)
                    <li class="group">
                        <a href="{{ $translation['url'] }}" hreflang="{{ $translation['slug'] }}" style="{{ $translation['current_lang'] ? 'font-weight: bold;' : '' }}">
                            {{ $translation['slug'] }}
                            <span class="group-last:hidden mx-1">/</span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <button @click="$store.menu.toggle()" x-text="$store.menu.open ? 'Close' : 'Menu'">Menu</button>
        </div>

    </div>
</header>
<div x-data x-cloak x-show="$store.menu.open" class="fixed top-0 left-0 w-full h-svh backdrop-blur-2xl bg-red/20 z-40 py-32 text-white">
    <div class="container">
        <ul class="flex lg:hidden mb-32">
            @foreach (pll_the_languages(['raw' => 1]) as $translation)
                <li class="group">
                    <a href="{{ $translation['url'] }}" hreflang="{{ $translation['slug'] }}" style="{{ $translation['current_lang'] ? 'font-weight: bold;' : '' }}">
                        {{ $translation['slug'] }}
                        <span class="group-last:hidden mx-1">/</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @if (has_nav_menu('primary_navigation'))
            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                @php
                    class CustomWalker extends Walker_Nav_Menu
                    {
                        function start_lvl(&$output, $depth = 0, $args = null)
                        {
                            $indent = str_repeat("\t", $depth);
                            $classes = match ($depth) {
                                0 => 'submenu uppercase mt-8 mb-8',
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
                                0 => 'mb-8',
                                1 => 'mb-8',
                                default => 'mb-8 after:content-[","] after:mr-2.5 last:after:hidden',
                            };

                            $has_children = in_array('menu-item-has-children', $classes);
                            $alpine_attrs = $has_children ? ' x-data="{ open: false }"' : '';

                            $class_names = join(' ', $classes);
                            $output .= $indent . '<li class="' . esc_attr($class_names) . '"' . $alpine_attrs . '>';

                            $link_classes = match ($depth) {
                                0 => 'text-50',
                                1 => 'text-30',
                                default => 'text-30',
                            };

                            if ($has_children) {
                                $output .=
                                    '<a href="' .
                                    esc_attr($item->url) .
                                    '" class="' .
                                    $link_classes .
                                    '" @click.prevent="open = !open" x-effect="if (!$store.menu.open) open = false">' .
                                    apply_filters('the_title', $item->title, $item->ID) .
                                    ' <span class="ml-2" x-text="open ? \'-\' : \'+\'">+</span></a>';
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
