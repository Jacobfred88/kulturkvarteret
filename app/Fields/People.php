<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class People extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $people = new FieldsBuilder('people',[
            'hide_on_screen' => [
                0 => 'the_content'
            ]
        ]);

        $people
            ->setLocation('post_type', '==', 'person');

        $people
            ->addImage('image', [
                'label' => 'Image',
                'instructions' => 'This image will be used for search results. Format: 2000x2667px ( JPG )'
            ])
            ->addText('title', [
                'label' => 'Title',
            ])
            ->addText('email', [
                'label' => 'Email',
            ])
            ->addText('phone', [
                'label' => 'Phone',
            ]);


        return $people->build();
    }
}
