<section data-block-name="entries" class="my-22 md:my-34" x-data="entries">
    <div class="overflow-hidden py-5">
        <div class="container grid gap-y-10">
            <div class="col-span-12 lg:col-span-3">
                <div class="relative h-full bg-white z-[1]">
                    @if ($headline)
                        <h2 class="text-16 max-w-[16rem] text-balance">{{ $headline }}</h2>
                    @endif

                    <div class="mt-8 gap-x-2.5 hidden md:flex">
                        <button class="relative size-8 border rounded-full cursor-pointer border-red hover:bg-red hover:text-white duration-300 group overflow-hidden" @click="prev">
                            <span class="absolute top-0 left-0 w-full h-full flex items-center justify-center group-hover:-translate-x-1/2 group-hover:opacity-0 duration-300">←</span>
                            <span class="absolute top-0 left-0 w-full h-full flex items-center justify-center translate-x-1/2 group-hover:translate-x-0 opacity-0 group-hover:opacity-100 duration-300">←</span>
                        </button>
                        <button class="relative size-8 border rounded-full cursor-pointer border-red hover:bg-red hover:text-white duration-300 group overflow-hidden" @click="next">
                            <span class="absolute top-0 left-0 w-full h-full flex items-center justify-center group-hover:translate-x-1/2 group-hover:opacity-0 duration-300">→</span>
                            <span class="absolute top-0 left-0 w-full h-full flex items-center justify-center -translate-x-1/2 group-hover:translate-x-0 opacity-0 group-hover:opacity-100 duration-300">→</span>
                        </button>
                    </div>
                    <div class="absolute  -top-5 -bottom-5 -left-5 w-5  bg-white hidden lg:block"></div>
                    <div class="absolute  -top-5 -bottom-5 -right-5 w-5  bg-gradient-to-tr from-white to-red/0 hidden lg:block"></div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9">
                @if ($entries)
                    <div class="images">

                        @foreach ($entries as $entry)
                            <div class="w-[95%] lg:w-[calc(33.333%-0.8rem)] mr-5 flex flex-col slide">
                                <div class="mb-4 w-full col-span-12">
                                    @if (!empty($entry['link']))
                                        <a href="{{ $entry['link']['url'] }}" target="{{ $entry['link']['target'] }}" class="block">
                                    @endif
                                    <div class="relative @if ($format == 'portrait') aspect-[0.734] @else aspect-square @endif  rounded-lg overflow-hidden @if (!empty($entry['link'])) fx-hover-zoom @endif">
                                        <x-media :mediagroup="$entry['mediagroup']" />
                                    </div>
                                    @if (!empty($entry['link']))
                                        </a>
                                    @endif
                                </div>
                                <div class="col-span-12 flex-shrink-0 flex flex-col flex-grow">

                                    @if (!empty($entry['headline']))
                                        <h3 class="text-24 lg:text-32 uppercase h-[var(--alignheightheadline)]" data-alignheight-headline>{!! $entry['headline'] !!}</h3>
                                    @endif

                                    <div class="mt-10 flex flex-col flex-grow justify-between max-w-xs h-[var(--alignheighttext)]" data-alignheight-text>
                                        @if (!empty($entry['text']))
                                            <div class="richtext">{!! $entry['text'] !!}</div>
                                        @endif

                                        @if (!empty($entry['link']))
                                            <a href="{{ $entry['link']['url'] }}" target="{{ $entry['link']['target'] }}" class="link-btn mt-8 inline-block">{{ $entry['link']['title'] }}</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                @endif
            </div>
        </div>
</section>
