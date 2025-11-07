<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('headline');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
    ->addTrueFalse('removegradiant', [
        'label' => 'Remove gradiant overlay',
        'default_value' => false,
        'ui' => true,
    ]);

return $module;
