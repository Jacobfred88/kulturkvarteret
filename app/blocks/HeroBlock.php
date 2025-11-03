<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ResponsiveMedia;

$module = new FieldsBuilder('hero');
$module
    ->addFields($this->get(ResponsiveMedia::class))
      ->addTextArea('headline', [
        'label' => 'Headline',
        'new_lines' => 'br'
      ]);
return $module;
