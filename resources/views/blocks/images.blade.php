<section data-block-name="images">
    <div class="container grid py-32">
        @if ($images)
            @foreach ($images as $image)
                <div class="col-span-12 lg:col-span-6">
                    <div class="relative aspect-video">
                        <x-media :mediagroup="$image['mediagroup']" />
                    </div>

                    <div class="flex justify-between">
                        @if ($image['caption'])
                            <p>{{ $image['caption'] }}</p>
                        @endif

                        @if ($image['credit'])
                            <p>Credit: {{ $image['credit'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
