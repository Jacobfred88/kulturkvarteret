@extends('layouts.app')

@section('content')
  @if (get_field('layout_blocks'))
      @foreach (get_field('layout_blocks') as $block)
          @include('blocks.' . $block['acf_fc_layout'], $block)
      @endforeach
  @endif
@endsection
