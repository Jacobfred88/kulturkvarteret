<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Media;

$module = new FieldsBuilder('entries');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
    ->addRepeater('entries', ['label' => 'Entries','layout' => 'block'])
        ->addFields($this->get(Media::class))
        ->modifyField('mediagroup', ['instructions' => 'Choose whatever format you want but make sure the image is at least 2000px wide.'])
         ->addTextArea('headline', [
            'label' => 'Headline',
            'new_lines' => 'br'
        ])
        ->addWysiwyg('text', [
            'toolbar' => 'basic',
        ])
        ->addLink('link', [
            'label' => 'Link',
        ])
    ->endRepeater()
    ->addSelect('format', [
        'label' => 'Image:format',
        'choices' => [
            'square' => 'Square',
            'portrait' => 'Portrait',
        ],
        'default_value' => 'fullscreen',
    ]);

return $module;
