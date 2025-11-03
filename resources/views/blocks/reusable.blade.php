@if ($reusable_block_ref && $reusable_block_ref[0])
    @foreach (get_fields($reusable_block_ref[0]->ID)['layout_blocks'] as $block)
        @include('blocks.' . $block['acf_fc_layout'], $block)
    @endforeach
@endif
