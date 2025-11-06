<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('content');

$module
    ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
    ])
     ->addWysiwyg('asidetext', [
        'toolbar' => 'basic',
        'label' => 'Aside text',
    ])
    ->addWysiwyg('text', [
        'toolbar' => 'basic',
    ])
    ->addLink('link', [
        'label' => 'Link',
    ]);

return $module;
