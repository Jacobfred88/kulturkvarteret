<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Media;

$module = new FieldsBuilder('images');

$module
    ->addRepeater('images', ['label' => 'Images','layout' => 'block'])
        ->addFields($this->get(Media::class))
        ->addTextArea('caption', [
            'label' => 'Caption',
            'new_lines' => 'br'
        ])
        ->addText('credit', [
            'label' => 'Credit',
        ])
    ->endRepeater();

return $module;
