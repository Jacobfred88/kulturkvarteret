<section data-block-name="related" class="my-22 md:my-34" x-data="entries">

    <div class="overflow-hidden py-5">
        <div class="container grid gap-y-10">
            <div class="col-span-12 lg:col-span-3">
                <div class="relative h-full bg-white z-[1]">
                    @if ($headline)
                        <h2 class="text-16 max-w-[16rem] text-balance">{{ $headline }}</h2>
                    @endif

                    <div class="mt-8 gap-x-2.5 hidden md:flex">
                        <button class="size-8 border rounded-full cursor-pointer border-red hover:bg-red hover:text-white duration-300" @click="prev">←</button>
                        <button class="size-8 border rounded-full cursor-pointer border-red hover:bg-red hover:text-white duration-300" @click="next">→</button>
                    </div>
                    <div class="absolute  -top-5 -bottom-5 -left-5 w-5  bg-white hidden lg:block"></div>
                    <div class="absolute  -top-5 -bottom-5 -right-5 w-5  bg-gradient-to-tr from-white to-white/0 hidden lg:block"></div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9">
                @if ($items)
                    <div class="images">

                        @foreach ($items as $item)
                            @php
                                $fields = get_fields($item->ID);
                            @endphp
                            <div class="w-[95%] lg:w-[calc(33.333%-0.8rem)] mr-5 flex flex-col slide">
                                <div class="mb-4 w-full col-span-12">

                                    <a href="{{ get_permalink($item) }}" class="block">

                                        <div class="relative  aspect-square rounded-lg overflow-hidden fx-hover-zoom">
                                            <x-media :mediagroup="$fields['mediagroup']" />
                                        </div>

                                    </a>

                                </div>
                                <div class="col-span-12 flex-shrink-0 flex flex-col flex-grow">

                                    <h3 class="text-24 xl:text-32 uppercase h-[var(--alignheightheadline)] pr-8" data-alignheight-headline>{{ $fields['headline'] ? $fields['headline'] : $item->post_title }}</h3>

                                    <div class="mt-10 flex flex-col flex-grow justify-between max-w-xs h-[var(--alignheighttext)]" data-alignheight-text>

                                        <div class="richtext pr-8">{!! $fields['intro'] !!}</div>

                                        @php
                                            $readMore = function_exists('pll_current_language') && pll_current_language('slug') === 'en' ? 'Read more' : 'Læs mere';
                                        @endphp
                                        <a href="{{ get_permalink($item) }}" class="link-btn mt-8 inline-block">{{ $readMore }}</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                @endif
            </div>
        </div>
</section>
