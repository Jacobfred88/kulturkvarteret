<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('content');

// $module
//     ->addTextArea('headline', [
//         'label' => 'Headline',
//         'new_lines' => 'br'
//     ])

return $module;
