<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('list');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
    ->addRepeater('entries', ['label' => 'Entries','layout' => 'block'])
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
    ->endRepeater();

return $module;
