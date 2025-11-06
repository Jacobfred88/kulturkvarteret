<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ResponsiveMedia;

$module = new FieldsBuilder('image');

$module
    ->addFields($this->get(ResponsiveMedia::class))
    ->addTextArea('caption', [
    'label' => 'Caption',
    'new_lines' => 'br'
    ])
    ->addText('credit', [
        'label' => 'Credit',
    ]);

return $module;
