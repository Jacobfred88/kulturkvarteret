@extends('layouts.app')

@section('content')

    @php

        $page_404 = get_page_by_path('404');
        if ($page_404) {
            // Set up global post data
            global $post;
            $post = $page_404;
            setup_postdata($post);
        }

    @endphp
    @if (get_field('layout_blocks'))
        @foreach (get_field('layout_blocks') as $block)
            @include('blocks.' . $block['acf_fc_layout'], $block)
        @endforeach
    @endif
@endsection
