<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('reusable');

$module
    ->addRelationship('reusable_block_ref', [
        'label' => 'Reusable block',
        'instructions' => '',
        'required' => 1,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'post_type' => ['reusableblocks'],
        'min' => '1',
        'max' => '1',
        'return_format' => 'object',
    ]);

return $module;

