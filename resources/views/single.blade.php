@extends('layouts.app')

@section('content')
    @if (get_post_type() == 'institution' or get_post_type() == 'foodanddrink')
        <div class="relative h-[70svh] bg-red flex items-center" x-data="hero">

            <div class="absolute inset-0 w-full h-full overflow-hidden">
                <div x-ref="media" class="absolute inset-0 w-full h-full scale-110 will-change-transform">
                    <x-media :mediagroup="get_field('page')['mediagroup']" />
                </div>
                {{-- <div x-ref="gradient" class="absolute inset-0 bg-gradient-to-t from-red/70 to-red/0 opacity-0"></div> --}}
            </div>
            <div class="container grid relative">
                <div class="col-span-12 lg:col-span-9 lg:col-start-4">
                    <h1 class="text-32 md:text-50 text-white uppercase opacity-0" x-ref="text">{{ get_field('headline') ? get_field('headline') : get_the_title() }}</h1>
                </div>
            </div>
        </div>
    @endif
    @if (get_field('layout_blocks'))
        @foreach (get_field('layout_blocks') as $block)
            @include('blocks.' . $block['acf_fc_layout'], $block)
        @endforeach
    @endif
@endsection
