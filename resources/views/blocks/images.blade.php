<section data-block-name="images" class="my-24 md:my-36">
    <div class="container grid gap-y-10">
        @if ($images)
            @foreach ($images as $image)
                <div class="col-span-12 md:col-span-6">
                    <div class="relative aspect-square md:aspect-[1.43] rounded-lg overflow-hidden">
                        <x-media :mediagroup="$image['mediagroup']" />
                    </div>

                    <div class="flex flex-col md:flex-row gap-y-1 justify-between mt-2.5">
                        @if ($image['caption'])
                            <p class="text-10 uppercase">{{ $image['caption'] }}</p>
                        @endif

                        @if ($image['credit'])
                            <p class="text-10 uppercase">Credit: {{ $image['credit'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
