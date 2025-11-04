<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

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
        ->addFlexibleContent('layout_blocks',[
            'button_label' => 'Add layout',
            'label' => 'Blocks',
            'instructions' => 'You can add as many content blocks as you like!',
        ])

            ->addLayout(require __DIR__ . '../../blocks/HeroBlock.php',[
                'label' => '🖥 Hero',
            ])
            ->addLayout(require __DIR__ . '../../blocks/HeropageBlock.php',[
                'label' => '🖥 Hero Page',
            ])
            ->addLayout(require __DIR__ . '../../blocks/CollectionBlock.php',[
                'label' => '📚 Collection',
            ])
            ->addLayout(require __DIR__ . '../../blocks/ContentBlock.php',[
                'label' => '📝 Content',
            ])
            ->addLayout(require __DIR__ . '../../blocks/EntriesBlock.php',[
                'label' => '📋 Entries'
            ])
            ->addLayout(require __DIR__ . '../../blocks/HeadlineBlock.php',[
                'label' => '🔤 Headline',
            ])
            ->addLayout(require __DIR__ . '../../blocks/HeadlineandtextBlock.php',[
                'label' => '🔤 Headline and Text',
            ])
            ->addLayout(require __DIR__ . '../../blocks/ImageBlock.php',[
                'label' => '🖼 Image',
            ])
            ->addLayout(require __DIR__ . '../../blocks/ImagesBlock.php',[
                'label' => '🖼 Images',
            ])
            ->addLayout(require __DIR__ . '../../blocks/ListBlock.php',[
                'label' => '📃 List',
            ])
            ->addLayout(require __DIR__ . '../../blocks/RelatedBlock.php',[
                'label' => '🔗 Related'
            ])
        ->endFlexibleContent();

        return $layout->build();
    }
}
