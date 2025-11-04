<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

$module = new FieldsBuilder('entries');

// $module
//     ->addTextArea('headline', [
//         'label' => 'Headline',
//         'new_lines' => 'br'
//     ])

return $module;
