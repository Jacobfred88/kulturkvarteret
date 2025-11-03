   <video class="absolute left-0 top-0 w-full h-full object-cover" src="{{ $src }}" muted autoplay playsinline loop
       @if (isset($poster) && $poster) poster="{{ $poster['sizes']['large'] }}" @endif></video>
