<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('collection');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
    ->addRelationship('items', [
        'label' => 'Collection items',
        'post_type' => ['institution', 'foodanddrink'],
        'filters' => ['search', 'post_type', 'taxonomy'],
        'return_format' => 'object',
        'multiple' => 1,
    ]);

return $module;
