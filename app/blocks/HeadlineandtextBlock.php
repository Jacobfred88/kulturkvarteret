<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('headlineandtext');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
    ->addWysiwyg('text', [
        'toolbar' => 'basic',
    ])
    ->addLink('link', [
        'label' => 'Link',
    ]);

return $module;
