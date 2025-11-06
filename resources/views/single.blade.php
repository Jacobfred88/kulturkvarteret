@extends('layouts.app')

@section('content')
    @if (get_post_type() == 'institution' or get_post_type() == 'foodanddrink')
        <div class="relative h-svh bg-red flex items-center">
            <x-media :mediagroup="get_field('page')['mediagroup']" />

            <div class="container relative">
                <h1 class="text-50 text-white uppercase text-center font-medium mb-20">{{ get_field('headline') ? get_field('headline') : get_the_title() }}</h1>
            </div>
        </div>
    @endif
    @if (get_field('layout_blocks'))
        @foreach (get_field('layout_blocks') as $block)
            @include('blocks.' . $block['acf_fc_layout'], $block)
        @endforeach
    @endif
@endsection
