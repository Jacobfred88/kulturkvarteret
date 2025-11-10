<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ResponsiveMedia;

$module = new FieldsBuilder('heropage');

$module
    ->addFields($this->get(ResponsiveMedia::class))
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
