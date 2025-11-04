<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;
use App\Fields\Partials\Media;

class Institution extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $institutions = Builder::make('institutions', [
            'title' => 'Post info',
            'hide_on_screen' => [
                0 => 'the_content'
            ]
        ]);

        $institutions
            ->setLocation('post_type', '==', 'institution')
            ->or('post_type', '==', 'foodanddrink');

        $institutions
            ->addFields($this->get(Media::class))
                ->modifyField('mediagroup', ['label' => 'Cover', 'instructions' => 'Used on archive pages. Format: 2000x1205px ( JPG )'])
            ->addGroup('page')
                ->addFields($this->get(Media::class))
                ->modifyField('mediagroup', ['label' => 'Page cover', 'instructions' => 'Used on the subpage. Format: 2000x2266px ( JPG )'])
            ->endGroup()
            ->addTextArea('headline', [
                'label' => 'Headline',
                'rows' => 3,
            ])
            ->addWysiwyg('intro', [
                'label' => 'Intro',
                'toolbar' => 'basic',
            ])
            ->addFlexibleContent('layout_blocks',[
                'button_label' => 'Add layout',
                'label' => 'Blocks',
                'instructions' => 'You can add as any content blocks as you like!',
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

        return $institutions->build();
    }
}
