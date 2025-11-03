<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Theme;

class Layout extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $layout = new FieldsBuilder('layout',[
            'hide_on_screen' => [
                0 => 'the_content'
            ]
        ]);

        $layout
            ->setLocation('post_type', '==', 'page')
            ->or('post_type', '==', 'reusableblocks');

        $layout
        ->addFields($this->get(Theme::class))
        ->addFlexibleContent('layout_blocks',[
            'button_label' => 'Add layout',
            'label' => 'Blocks',
            'instructions' => 'You can add as many content blocks as you like!',
        ])

            ->addLayout(require __DIR__ . '../../blocks/HeroBlock.php',[
                'label' => '🖥 Hero',
            ])
            ->addLayout(require  __DIR__ . '../../blocks/ReusableBlock.php',[
                'label' => '⚙️ Reusable'
            ])
        ->endFlexibleContent();

        return $layout->build();
    }
}
